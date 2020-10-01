<?php

namespace App\Http\Controllers\Financeiro;

use App\Models\Admin\Permission;
use App\Models\Financeiro\Aporte;
use App\Models\Financeiro\Garantia;
use App\Models\Financeiro\Movimento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AporteController extends Controller
{
    private $aportes;

    /**
     * AporteController constructor.
     * @param Aporte $Aporte
     */
    public function __construct(Aporte $aporte)
    {
        $this->aportes = $aporte;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        Permission::checkAccess('aporte_view');

        return view('financeiro.aportes.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function anyData()
    {
        $aporte = Aporte::query();

        return  DataTables::of($aporte)
            ->addColumn('action', function ($aporte) {
                return '<a href="'.route('financeiro.aportes.edit', $aporte->id).'" title="Editar" style=" float: left; color:blue">
                            <i style="padding-right:6px; padding-left:6px" class="fa fa-pencil-square-o fa-lg"></i>
                        </a>
                        <form action="'.route('financeiro.aportes.destroy', $aporte->id).'" method="POST" class="form-delete " style="float: left;">
                            <a href="'.route('financeiro.aportes.destroy', $aporte->id).'" title="Deletar" style="color:red">
                            <i style="padding-right:6px; padding-left:6px " class="fa fa-trash-o fa-lg"></i></a>
                            <input type="hidden" name="_method" value="DELETE" >
                            '.csrf_field().'
                        </form>';
            })
            ->make(true);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        Permission::checkAccess('aporte_create');

        return view('financeiro.aportes.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Permission::checkAccess('aporte_create');



        $dataForm = $request->all();
        $dataForm['saldo'] = $dataForm['valor'];
        $dataForm['rendimento'] = 0;
        $dataForm['situacao'] = 0;
        $dataForm['update_rendimento'] = now();
        if (empty($dataForm['ativo'])) {
            $dataForm['ativo'] = 'false';
        }
        try {
            DB::beginTransaction();

            $insert = $this->aportes->create($dataForm);
            if ($insert->ativo){
                MovimentoController::salvaMovimentoAporte($dataForm, $insert);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $insert = false;
        }
        if ($insert) {
            return redirect()->route('financeiro.aportes.index')->withFlashSuccess('Aporte cadastrado!');
        } else {
            return redirect()->back()->withFlashError('Erro ao salvar aporte');
        }
    }

    /**
     * @param $aporte
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($aporte)
    {
        Permission::checkAccess('aporte_edit');

        $data = $this->aportes->findOrFail($aporte);
        if ($data->ativo) {
            return redirect()->route('financeiro.aportes.index')->withFlashInfo('Aporte já esta ativo e não pode ser modificado!');
        } else {
            return view('financeiro.aportes.create', compact('data'));
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        Permission::checkAccess('aporte_edit');

        $dataForm = $request->all();
        $dataForm['update_rendimento'] = now();
        if (empty($dataForm['ativo'])) {
            $dataForm['ativo'] = 'false';
        }

        try {
            DB::beginTransaction();

            $aporte = $this->aportes->findOrFail($id);
            $update = $aporte->update($dataForm);

            if ($dataForm['ativo'] == 'true'){
                MovimentoController::salvaMovimentoAporte($dataForm, $aporte);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $update = false;
        }

        if ($update) {
            return redirect()->route('financeiro.aportes.index')->withFlashSuccess('Dados da aplicação atualizados com sucesso');
        } else {
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($aporte)
    {
        Permission::checkAccess('aporte_delete');

        $delete = $this->aportes->findOrFail($aporte)->delete();

        //$this->validate($request, $this->product->rules, $this->product->messages);

        if ($delete) {
            return redirect()->route('financeiro.aportes.index')->withFlashSuccess('Aplicação deletado!');
        } else {
            return redirect()->back();
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function painel()
    {
        Permission::checkAccess('cliente_painel');

        $aportes = $this->aportes->select( DB::raw('sum(saldo) as saldo, sum(rendimento) as rendimento'))
            ->where('pessoa_id', Auth::user()->pessoa_id)->first();
        $movimentos = Movimento::select( DB::raw("sum(case when tipo = 'C' then valor when tipo = 'D' then valor*-1 end) as valor, sum(0) as bloqueado"))
            ->where('pessoa_id', Auth::user()->pessoa_id)->first();

        return view('financeiro.painel.painel', compact('aportes', 'movimentos'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function aporte()
    {
        Permission::checkAccess('cliente_aporte');

        $aportes = $this->aportes->where('pessoa_id', Auth::user()->pessoa_id)->get();
        $garantias = Garantia::where('pessoa_id', Auth::user()->pessoa_id)->get();
        return view('financeiro.painel.aporte', compact('aportes', 'garantias'));
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function extrato()
    {
        Permission::checkAccess('cliente_extrato');

        $data = Movimento::where('pessoa_id', Auth::user()->pessoa_id)->get();

        return view('financeiro.painel.extrato', compact('data'));
    }
}

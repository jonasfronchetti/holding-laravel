<?php

namespace App\Http\Controllers\Financeiro;

use App\Models\Admin\Permission;
use App\Models\Financeiro\FundoInvestimento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class FundoInvestimentoController extends Controller
{
    private $fundoInvestimentos;

    /**
     * InvestimentoController constructor.
     * @param Investimento $Investimento
     */
    public function __construct(FundoInvestimento $investimento)
    {
        $this->fundoInvestimentos = $investimento;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        Permission::checkAccess('fundo_investimento_view');

        return view('financeiro.fundoinvestimentos.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function anyData()
    {
        $investimento = FundoInvestimento::query();

        return  DataTables::of($investimento)
            ->addColumn('action', function ($investimento) {
                return '<a href="'.route('financeiro.fundoinvestimentos.edit', $investimento->id).'" title="Editar" style=" float: left; color:blue">
                            <i style="padding-right:6px; padding-left:6px" class="fa fa-pencil-square-o fa-lg"></i>
                        </a>
                        <form action="'.route('financeiro.fundoinvestimentos.destroy', $investimento->id).'" method="POST" class="form-delete " style="float: left;">
                            <a href="'.route('financeiro.fundoinvestimentos.destroy', $investimento->id).'" title="Deletar" style="color:red">
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
        Permission::checkAccess('fundo_investimento_create');

        return view('financeiro.fundoinvestimentos.create');
    }

    /**
     * @param FundoInvestimentoFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Permission::checkAccess('fundo_investimento_create');

        $dataForm = $request->all();
        $dataForm['usuario_id'] = Auth::user()->id;

        $insert = $this->fundoInvestimentos->create($dataForm);
        if ($insert) {
            return redirect()->route('financeiro.fundoinvestimentos.index')->withFlashSuccess('FundoInvestimento cadastrado!');
        } else {
            return redirect()->back();
        }
    }

    /**
     * @param $investimento
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($investimento)
    {
        Permission::checkAccess('fundo_investimento_edit');

        $data = $this->fundoInvestimentos->findOrFail($investimento);

        return view('financeiro.fundoinvestimentos.create', compact('data'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        Permission::checkAccess('fundo_investimento_edit');

        $dataForm = $request->all();

        $investimento = $this->fundoInvestimentos->findOrFail($id);
        $update = $investimento->update($dataForm);


        if ($update) {
            return redirect()->route('financeiro.fundoinvestimentos.index')->withFlashSuccess('Dados da aplicação atualizados com sucesso');
        } else {
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($investimento)
    {
        Permission::checkAccess('fundo_investimento_delete');

        $delete = $this->fundoInvestimentos->findOrFail($investimento)->delete();

        //$this->validate($request, $this->product->rules, $this->product->messages);

        if ($delete) {
            return redirect()->route('financeiro.fundoinvestimentos.index')->withFlashSuccess('Aplicação deletado!');
        } else {
            return redirect()->back();
        }
    }
}

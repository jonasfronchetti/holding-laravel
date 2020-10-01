<?php

namespace App\Http\Controllers\Financeiro;

use App\Models\Admin\Permission;
use App\Models\Financeiro\Garantia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class GarantiaController extends Controller
{
    private $garantias;

    /**
     * GarantiaController constructor.
     * @param Garantia $Garantia
     */
    public function __construct(Garantia $aporte)
    {
        $this->garantias = $aporte;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        Permission::checkAccess('aporte_view');

        return view('financeiro.garantias.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function anyData()
    {
        $aporte = Garantia::query();

        return  DataTables::of($aporte)
            ->addColumn('action', function ($aporte) {
                return '<a href="'.route('financeiro.garantias.edit', $aporte->id).'" title="Editar" style=" float: left; color:blue">
                            <i style="padding-right:6px; padding-left:6px" class="fa fa-pencil-square-o fa-lg"></i>
                        </a>
                        <form action="'.route('financeiro.garantias.destroy', $aporte->id).'" method="POST" class="form-delete " style="float: left;">
                            <a href="'.route('financeiro.garantias.destroy', $aporte->id).'" title="Deletar" style="color:red">
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

        return view('financeiro.garantias.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Permission::checkAccess('aporte_create');

        $dataForm = $request->all();
        if (empty($dataForm['ativo'])) {
            $dataForm['ativo'] = 'false';
        }
        $dataForm['rendimento'] = 0;
        $dataForm['update_rendimento'] = now();
        $insert = $this->garantias->create($dataForm);
        if ($insert) {
            return redirect()->route('financeiro.garantias.index')->withFlashSuccess('Garantia cadastrado!');
        } else {
            return redirect()->back();
        }
    }

    /**
     * @param $garantia
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($garantia)
    {
        Permission::checkAccess('garantia_edit');

        $data = $this->garantias->findOrFail($garantia);

        if ($data->ativo) {
            return redirect()->route('financeiro.garantias.index')->withFlashInfo('Garantia já esta ativo e não pode ser modificado!');
        } else {
            return view('financeiro.garantias.create', compact('data'));
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        Permission::checkAccess('garantia_edit');

        $dataForm = $request->all();
        if (empty($dataForm['ativo'])) {
            $dataForm['ativo'] = 'false';
        }

        $garantia = $this->garantias->findOrFail($id);
        $update = $garantia->update($dataForm);

        if ($update) {
            return redirect()->route('financeiro.garantias.index')->withFlashSuccess('Dados da aplicação atualizados com sucesso');
        } else {
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($garantia)
    {
        Permission::checkAccess('garantia_delete');

        $delete = $this->garantias->findOrFail($garantia)->delete();

        //$this->validate($request, $this->product->rules, $this->product->messages);

        if ($delete) {
            return redirect()->route('financeiro.garantias.index')->withFlashSuccess('Aplicação deletado!');
        } else {
            return redirect()->back();
        }
    }
}

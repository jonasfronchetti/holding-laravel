<?php

namespace App\Http\Controllers\Financeiro;

use App\Models\Admin\Permission;
use App\Models\Financeiro\TipoDespesa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class TipoDespesaController extends Controller
{
    private $tipodespesas;

    /**
     * TipoDespesaController constructor.
     * @param TipoDespesa $TipoDespesa
     */
    public function __construct(TipoDespesa $tipodespesa)
    {
        $this->tipodespesas = $tipodespesa;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        Permission::checkAccess('tipodespesa_view');

        return view('financeiro.tipodespesas.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function anyData()
    {
        $tipodespesa = TipoDespesa::query();

        return  DataTables::of($tipodespesa)
            ->addColumn('action', function ($tipodespesa) {
                return '<a href="'.route('financeiro.tipodespesas.edit', $tipodespesa->id).'" title="Editar" style=" float: left; color:blue">
                            <i style="padding-right:6px; padding-left:6px" class="fa fa-pencil-square-o fa-lg"></i>
                        </a>
                        <form action="'.route('financeiro.tipodespesas.destroy', $tipodespesa->id).'" method="POST" class="form-delete " style="float: left;">
                            <a href="'.route('financeiro.tipodespesas.destroy', $tipodespesa->id).'" title="Deletar" style="color:red">
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
        Permission::checkAccess('tipodespesa_create');

        return view('financeiro.tipodespesas.create');
    }

    /**
     * @param TipoDespesaFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Permission::checkAccess('tipodespesa_create');

        $dataForm = $request->all();

        $insert = $this->tipodespesas->create($dataForm);
        if ($insert) {
            return redirect()->route('financeiro.tipodespesas.index')->withFlashSuccess('Tipo de Despesa cadastrada!');
        } else {
            return redirect()->back();
        }
    }

    /**
     * @param $tipodespesa
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($tipodespesa)
    {
        Permission::checkAccess('tipodespesa_edit');

        $data = $this->tipodespesas->findOrFail($tipodespesa);

        return view('financeiro.tipodespesas.create', compact('data'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        Permission::checkAccess('tipodespesa_edit');

        $dataForm = $request->all();

        $tipodespesa = $this->tipodespesas->findOrFail($id);
        $update = $tipodespesa->update($dataForm);


        if ($update) {
            return redirect()->route('financeiro.tipodespesas.index')->withFlashSuccess('Dados da aplicação atualizados com sucesso');
        } else {
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($tipodespesa)
    {
        Permission::checkAccess('tipodespesa_delete');

        $delete = $this->tipodespesas->findOrFail($tipodespesa)->delete();

        //$this->validate($request, $this->product->rules, $this->product->messages);

        if ($delete) {
            return redirect()->route('financeiro.tipodespesas.index')->withFlashSuccess('Aplicação deletado!');
        } else {
            return redirect()->back();
        }
    }
}

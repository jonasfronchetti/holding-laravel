<?php

namespace App\Http\Controllers\Financeiro;

use App\Models\Admin\Permission;
use App\Models\Financeiro\Despesa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class DespesaController extends Controller
{
    private $despesas;

    /**
     * DespesaController constructor.
     * @param Despesa $Despesa
     */
    public function __construct(Despesa $despesa)
    {
        $this->despesas = $despesa;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        Permission::checkAccess('despesa_view');

        return view('financeiro.despesas.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function anyData()
    {
        $despesa = Despesa::query();

        return  DataTables::of($despesa)
            ->addColumn('action', function ($despesa) {
                return '<a href="'.route('financeiro.despesas.edit', $despesa->id).'" title="Editar" style=" float: left; color:blue">
                            <i style="padding-right:6px; padding-left:6px" class="fa fa-pencil-square-o fa-lg"></i>
                        </a>
                        <form action="'.route('financeiro.despesas.destroy', $despesa->id).'" method="POST" class="form-delete " style="float: left;">
                            <a href="'.route('financeiro.despesas.destroy', $despesa->id).'" title="Deletar" style="color:red">
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
        Permission::checkAccess('despesa_create');

        return view('financeiro.despesas.create');
    }

    /**
     * @param DespesaFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Permission::checkAccess('despesa_create');

        $dataForm = $request->all();

        $insert = $this->despesas->create($dataForm);
        if ($insert) {
            return redirect()->route('financeiro.despesas.index')->withFlashSuccess('Despesa cadastrado!');
        } else {
            return redirect()->back();
        }
    }

    /**
     * @param $despesa
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($despesa)
    {
        Permission::checkAccess('despesa_edit');

        $data = $this->despesas->findOrFail($despesa);

        return view('financeiro.despesas.create', compact('data'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        Permission::checkAccess('despesa_edit');

        $dataForm = $request->all();

        $despesa = $this->despesas->findOrFail($id);
        $update = $despesa->update($dataForm);


        if ($update) {
            return redirect()->route('financeiro.despesas.index')->withFlashSuccess('Dados da aplicação atualizados com sucesso');
        } else {
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($despesa)
    {
        Permission::checkAccess('despesa_delete');

        $delete = $this->despesas->findOrFail($despesa)->delete();

        //$this->validate($request, $this->product->rules, $this->product->messages);

        if ($delete) {
            return redirect()->route('financeiro.despesas.index')->withFlashSuccess('Aplicação deletado!');
        } else {
            return redirect()->back();
        }
    }
}

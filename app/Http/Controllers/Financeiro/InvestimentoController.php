<?php

namespace App\Http\Controllers\Financeiro;

use App\Models\Admin\Permission;
use App\Models\Financeiro\Investimento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class InvestimentoController extends Controller
{
    private $investimentos;

    /**
     * InvestimentoController constructor.
     * @param Investimento $Investimento
     */
    public function __construct(Investimento $investimento)
    {
        $this->investimentos = $investimento;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        Permission::checkAccess('investimento_view');

        return view('financeiro.investimentos.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function anyData()
    {
        $investimento = Investimento::query();

        return  DataTables::of($investimento)
            ->addColumn('action', function ($investimento) {
                return '<a href="'.route('financeiro.investimentos.edit', $investimento->id).'" title="Editar" style=" float: left; color:blue">
                            <i style="padding-right:6px; padding-left:6px" class="fa fa-pencil-square-o fa-lg"></i>
                        </a>
                        <form action="'.route('financeiro.investimentos.destroy', $investimento->id).'" method="POST" class="form-delete " style="float: left;">
                            <a href="'.route('financeiro.investimentos.destroy', $investimento->id).'" title="Deletar" style="color:red">
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
        Permission::checkAccess('investimento_create');

        return view('financeiro.investimentos.create');
    }

    /**
     * @param InvestimentoFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Permission::checkAccess('investimento_create');

        $dataForm = $request->all();

        $insert = $this->investimentos->create($dataForm);
        if ($insert) {
            return redirect()->route('financeiro.investimentos.index')->withFlashSuccess('Investimento cadastrado!');
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
        Permission::checkAccess('investimento_edit');

        $data = $this->investimentos->findOrFail($investimento);

        return view('financeiro.investimentos.create', compact('data'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        Permission::checkAccess('investimento_edit');

        $dataForm = $request->all();

        $investimento = $this->investimentos->findOrFail($id);
        $update = $investimento->update($dataForm);


        if ($update) {
            return redirect()->route('financeiro.investimentos.index')->withFlashSuccess('Dados da aplicação atualizados com sucesso');
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
        Permission::checkAccess('investimento_delete');

        $delete = $this->investimentos->findOrFail($investimento)->delete();

        //$this->validate($request, $this->product->rules, $this->product->messages);

        if ($delete) {
            return redirect()->route('financeiro.investimentos.index')->withFlashSuccess('Aplicação deletado!');
        } else {
            return redirect()->back();
        }
    }
}

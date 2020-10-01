<?php

namespace App\Http\Controllers\Financeiro;

use App\Models\Admin\Permission;
use App\Models\Financeiro\Aplicacao;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class AplicacaoController extends Controller
{
    private $aplicacoes;

    /**
     * AplicacaoController constructor.
     * @param Aplicacao $Aplicacao
     */
    public function __construct(Aplicacao $aplicacao)
    {
        $this->aplicacoes = $aplicacao;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        Permission::checkAccess('aplicacao_view');

        return view('financeiro.aplicacoes.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function anyData()
    {
        $aplicacao = Aplicacao::query();

        return  DataTables::of($aplicacao)
            ->addColumn('action', function ($aplicacao) {
                return '<a href="'.route('financeiro.aplicacoes.edit', $aplicacao->id).'" title="Editar" style=" float: left; color:blue">
                            <i style="padding-right:6px; padding-left:6px" class="fa fa-pencil-square-o fa-lg"></i>
                        </a>
                        <form action="'.route('financeiro.aplicacoes.destroy', $aplicacao->id).'" method="POST" class="form-delete " style="float: left;">
                            <a href="'.route('financeiro.aplicacoes.destroy', $aplicacao->id).'" title="Deletar" style="color:red">
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
        Permission::checkAccess('aplicacao_create');

        return view('financeiro.aplicacoes.create');
    }

    /**
     * @param AplicacaoFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Permission::checkAccess('aplicacao_create');

        $dataForm = $request->all();

        $insert = $this->aplicacoes->create($dataForm);
        if ($insert) {
            return redirect()->route('financeiro.aplicacoes.index')->withFlashSuccess('Aplicacao cadastrado!');
        } else {
            return redirect()->back();
        }
    }

    /**
     * @param $aplicacao
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($aplicacao)
    {
        Permission::checkAccess('aplicacao_edit');

        $data = $this->aplicacoes->findOrFail($aplicacao);

        return view('financeiro.aplicacoes.create', compact('data'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        Permission::checkAccess('aplicacao_edit');

        $dataForm = $request->all();

        $aplicacao = $this->aplicacoes->findOrFail($id);
        $update = $aplicacao->update($dataForm);


        if ($update) {
            return redirect()->route('financeiro.aplicacoes.index')->withFlashSuccess('Dados da aplicação atualizados com sucesso');
        } else {
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($aplicacao)
    {
        Permission::checkAccess('aplicacao_delete');

        $delete = $this->aplicacoes->findOrFail($aplicacao)->delete();

        //$this->validate($request, $this->product->rules, $this->product->messages);

        if ($delete) {
            return redirect()->route('financeiro.aplicacoes.index')->withFlashSuccess('Aplicação deletado!');
        } else {
            return redirect()->back();
        }
    }

}

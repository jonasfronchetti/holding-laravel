<?php

namespace App\Http\Controllers\Basico;

use App\Models\Admin\Permission;
use App\Models\Basico\Configuracao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ConfiguracaoController extends Controller
{
    private $configuracoes;

    public function __construct(Configuracao $configuracao)
    {
        $this->configuracoes = $configuracao;
    }

    public function index()
    {
        Permission::checkAccess('configuracao_view');
        $configuracoes = $this->configuracoes->all();

        return view('basico.configuracoes.index', compact('configuracoes'));
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function anyData()
    {
        $configuracoes = Configuracao::select('*');

        return DataTables::of($configuracoes)
            ->addColumn('action', function ($configuracoes) {
                return '<a href="'.route('basico.configuracoes.edit', $configuracoes->id).'" title="Editar" style=" float: left; color:blue">
                            <i style="padding-right:6px; padding-left:6px" class="fa fa-pencil-square-o fa-lg"></i>
                        </a>';
            })
            ->make(true);
    }

    /**
     * Show the form for creating new configuracao.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Permission::checkAccess('configuracao_create');

        return view('basico.configuracoes.create');
    }

    /**
     * Store a newly created configuracao in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Permission::checkAccess('configuracao_create');

        $dataForm = $request->all();
        //$dataForm['emitente_id'] = Auth::user()->emitente_id;

        $insert = $this->configuracoes->create($dataForm);
        if ($insert) {
            return redirect()->route('basico.configuracoes.index')->withFlashSuccess('Configuração cadastrada!');
        } else {
            return redirect()->back();
        }
    }


    /**
     * Show the form for editing Configuracao.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Permission::checkAccess('configuracao_edit');

        $data = $this->configuracoes->findOrFail($id);

        return view('basico.configuracoes.create', compact('data'));
    }

    /**
     * @param ProdutoFormRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        Permission::checkAccess('configuracao_edit');

        $dataForm = $request->all();

        $configuracao = $this->configuracoes->findOrFail($id);
        $update = $configuracao->update($dataForm);


        if ($update) {
            return redirect()->route('basico.configuracoes.index')->withFlashSuccess('Configuração atualizada com sucesso');
        } else {
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Permission::checkAccess('configuracao_delete');

        $delete = $this->configuracoes->findOrFail($id)->delete();

        //$this->validate($request, $this->product->rules, $this->product->messages);

        if ($delete) {
            return redirect()->route('basico.configuracoes.index')->withFlashSuccess('Configuraçao deletada!');
        } else {
            return redirect()->back();
        }
    }

}

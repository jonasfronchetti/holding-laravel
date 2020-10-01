<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Permission;
use App\Models\Admin\Empresa;
use App\Models\Estoque\Produto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class EmpresaController extends Controller
{
    private $empresa;

    /**
     * EmpresaController constructor.
     * @param Empresa $empresa
     */
    public function __construct(Empresa $empresa)
    {
        $this->empresa = $empresa;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        Permission::checkAccess('empresa_view');

        return view('admin.empresas.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function anyData()
    {
        $empresa = Empresa::query();
        /*$empresa = Empresa::select('bas_empresas.*', 'bas_pessoas.nome', 'bas_pessoas_juridicas.nomefantasia')
            ->join('bas_pessoas_juridicas', 'bas_pessoas_juridicas.id', '=', 'bas_empresas.pessoa_juridica_id')
            ->join('bas_pessoas', 'bas_pessoas.id', '=', 'bas_pessoas_juridicas.pessoa_id')
            //->where('bas_empresas.id', Auth::user()->empresa_id)
        ;*/
        return  DataTables::of($empresa)
            ->addColumn('action', function ($empresa) {
                return '<a href="'.route('admin.empresas.edit', $empresa->id).'" title="Editar" style=" float: left; color:blue">
                            <i style="padding-right:6px; padding-left:6px" class="fa fa-pencil-square-o fa-lg"></i>
                        </a>';
            })
            ->make(true);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        Permission::checkAccess('empresa_create');

        return view('admin.empresas.create');
    }

    /**
     * @param empresaFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Permission::checkAccess('empresa_create');

        $dataForm = $request->all();

        $dataForm['dtcadastro'] = now();
        $dataForm['ativo'] = 'true';

        $insert = $this->empresa->create($dataForm);
        $insert->update(['hash' => str_replace('/', '', Hash::make($insert->id))]);

        if ($insert) {
            return redirect()->route('admin.empresas.index')->withFlashSuccess('Empresa cadastrado!');
        } else {
            return redirect()->back();
        }
    }

    /**
     * @param $empresa
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($empresa)
    {
        Permission::checkAccess('empresa_edit');

        $data = $this->empresa->findOrFail($empresa);

        return view('admin.empresas.create', compact('data'));
    }

    /**
     * @param empresaFormRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        Permission::checkAccess('empresa_edit');

        $dataForm = $request->all();

        $empresa = $this->empresa->findOrFail($id);
        $update = $empresa->update($dataForm);


        if ($update) {
            return redirect()->route('admin.empresas.index')->withFlashSuccess('Dados da empresa atualizados com sucesso');
        } else {
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($empresa)
    {
        Permission::checkAccess('empresa_delete');

        $delete = $this->empresa->findOrFail($empresa)->delete();

        if ($delete) {
            return redirect()->route('admin.empresas.index')->withFlashSuccess('Empresa deletado!');
        } else {
            return redirect()->back();
        }
    }


}

<?php

namespace App\Http\Controllers\Basico;

use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use App\Models\Basico\Pessoa;
use App\Models\Basico\PessoaFisica;
use App\Models\Basico\PessoaJuridica;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PessoaController extends Controller
{
    private $pessoas;

    /**
     * PessoaController constructor.
     * @param Pessoa $pessoa
     */
    public function __construct(Pessoa $pessoa)
    {
        $this->pessoas = $pessoa;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        Permission::checkAccess('pessoa_view');

        return view('basico.pessoas.index');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function anyData()
    {
        $pessoa = Pessoa::query();

        return DataTables::of($pessoa)
            ->addColumn('action', function ($pessoa) {
                return '<a href="' . route('basico.pessoas.edit', $pessoa->id) . '" title="Editar" style=" float: left; color:blue">
                            <i style="padding-right:6px; padding-left:6px" class="fa fa-pencil-square-o fa-lg"></i>
                        </a>
                        <form action="' . route('basico.pessoas.destroy', $pessoa->id) . '" method="POST" class="form-delete " style="float: left;">
                                <a href="' . route('basico.pessoas.destroy', $pessoa->id) . '" title="Deletar" style="color:red">
                                <i style="padding-right:6px; padding-left:6px " class="fa fa-trash-o fa-lg"></i></a>
                                <input type="hidden" name="_method" value="DELETE" >
                        ' . csrf_field() . '
                        </form>';
            })
            ->make(true);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        Permission::checkAccess('pessoa_create');

        return view('basico.pessoas.create');
    }

    /**
     * @param PessoaFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Permission::checkAccess('pessoa_create');

        $dataForm = $request->all();
        try {
            DB::beginTransaction();
            $dataForm['dtcadastro'] = now();
            if (empty($dataForm['ativo'])) {
                $dataForm['ativo'] = 'false';
            }
            //$dataForm['emitente_id'] = auth()->user()->emitente_id;

            $pessoa = $this->pessoas->create($dataForm);
            $dataForm['pessoa_id'] = $pessoa->id;
            if ($dataForm['tipopessoa'] == 1) {
                $pessoaJuridica = PessoaJuridica::create($dataForm);
            } else {
                $pessoaFisica = PessoaFisica::create($dataForm);
            }

            if (! empty($dataForm['password'])) {
                $dataForm['password'] = bcrypt($dataForm['password']);
                $dataForm['pessoa_id'] = $pessoa->id;
                $dataForm['name'] = $dataForm['nome'];
                $user = User::create($dataForm);
                //vincula o usuario a regra de cliente
                $role = Role::where('name', 'cliente')->first();
                $user->roles()->attach($role);
            }

            DB::commit();
        } catch (\Exception $e) {

            DB::rollback();
            $pessoa = false;
        }

        if ($pessoa) {
            return redirect()->route('basico.pessoas.index')->withFlashSuccess('Cliente cadastrado!');
        } else {
            return redirect()->back();
        }
    }

    /**
     * @param $pessoa
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($pessoa)
    {
        Permission::checkAccess('pessoa_update');

        $pes = $this->pessoas->findOrFail($pessoa);

        if ($pes->tipopessoa == 1) {
            $pessoaVinculada = PessoaJuridica::where('pessoa_id', $pes->id)->get();
        } else {
            $pessoaVinculada = PessoaFisica::where('pessoa_id', $pes->id)->get();
        }

        $data = (array_merge($pessoaVinculada->toArray()[0], $pes->toArray()));

        return view('basico.pessoas.create', compact('data', 'pes'));
    }

    /**
     * @param PessoaFormRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        Permission::checkAccess('pessoa_update');

        $dataForm = $request->all();

        try {
            DB::beginTransaction();
            $pes = $this->pessoas->findOrFail($id);
            if (empty($dataForm['ativo'])) {
                $dataForm['ativo'] = 'false';
            }
            $update = $pes->update($dataForm);
            if ($dataForm['tipopessoa'] == 1) {
                PessoaJuridica::where('pessoa_id', $pes->id)->update($dataForm);
            } else {
                PessoaFisica::where('pessoa_id', $pes->id)->first()->update($dataForm);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $update = false;
        }

        if ($update) {
            return redirect()->route('basico.pessoas.index')->withFlashSuccess('Dados do cliente atualizados com sucesso');
        } else {
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($pessoa)
    {
        Permission::checkAccess('pessoa_delete');

        $delete = $this->pessoas->findOrFail($pessoa)->delete();

        if ($delete) {
            return redirect()->route('basico.pessoas.index')->withFlashSuccess('Cliente deletado!');
        } else {
            return redirect()->back();
        }
    }


}

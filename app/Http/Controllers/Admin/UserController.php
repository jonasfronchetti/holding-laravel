<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Empresa;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    private $user;

    /**
     * UserController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        Permission::checkAccess('user_view');
        $users = $this->user->all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function anyData()
    {
        $users = User::query();

        return DataTables::of($users)
            ->addColumn('action', function ($users) {
                return '<a href="' . route('admin.users.show', $users->id) . '" title="Visualizar" style=" float: left; color:#337ab7">
                            <i style="padding-right:6px; padding-left:6px" class="fa fa-search fa-lg"></i>
                        </a>
                        <a href="' . route('admin.users.edit', $users->id) . '" title="Editar" style=" float: left; color:blue">
                            <i style="padding-right:6px; padding-left:6px" class="fa fa-pencil-square-o fa-lg"></i>
                        </a>    
                        <form action="' . route('admin.users.destroy', $users->id) . '" method="POST" class="form-delete " style="float: left;">
                            <a href="' . route('admin.users.destroy', $users->id) . '" title="Deletar" style="color:red">
                            <i style="padding-right:6px; padding-left:6px " class="fa fa-trash-o fa-lg"></i></a>
                            <input type="hidden" name="_method" value="DELETE" >
                            ' . csrf_field() . '
                        </form>';
            })
            ->make(true);
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function roles($id)
    {
        //Recupera o usuário
        $user = $this->user->find($id);

        //recuperar roles
        $roles = $user->roles()->get();

        return view('admin.users.roles', compact('user', 'roles'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Permission::checkAccess('user_create');

        $roles = Role::get()->pluck('name', 'id');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Permission::checkAccess('user_create');

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        //$data['emitente_id'] = Auth::user()->emitente_id;
        $user = User::create($data);
        $user->roles()->sync(array_filter((array)$request->input('role')));

        return redirect()->route('admin.users.index')->withFlashSuccess('Dados cadastrado com sucesso');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Permission::checkAccess('user_edit');

        $roles = Role::get()->pluck('name', 'id');
        $user = User::findOrFail($id);

        return view('admin.users.create', compact('user', 'roles'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Permission::checkAccess('user_edit');

        $user = User::findOrFail($id);

        $data = $request->all();
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        $user->update($data);
        $user->roles()->sync(array_filter((array)$request->input('role')));

        return redirect()->route('admin.users.index')->withFlashSuccess('Dados atualizados com sucesso');
    }


    /**
     * Display User.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Permission::checkAccess('user_view');

        $roles = Role::get()->pluck('title', 'id');
        $user = User::findOrFail($id);
        $emitentes = Empresa::all();
        /*$emitentes = Empresa::select('bas_emitentes.*', 'bas_pessoas.nome', 'bas_pessoas_juridicas.nomefantasia', 'bas_pessoas_juridicas.ifederal')
            ->join('bas_pessoas_juridicas', 'bas_pessoas_juridicas.id', '=', 'bas_emitentes.pessoa_juridica_id')
            ->join('bas_pessoas', 'bas_pessoas.id', '=', 'bas_pessoas_juridicas.pessoa_id')
            ->where('bas_emitentes.id', $user->emitente_id)->get();*/

        return view('admin.users.show', compact('user', 'roles', 'emitentes'));
    }

    /**
     * Remove User from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::checkAccess('user_delete');

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->withFlashSuccess('Usuários deletado');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        Permission::checkAccess('user_delete');

        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        Permission::checkAccess('role_view');
        $roles = $this->role->all();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function anyData()
    {
        $roles = Role::query();

        return DataTables::of($roles)
            ->addColumn('action', function ($roles) {
                return '<a href="'.route('admin.roles.show', $roles->id).'" title="Visualizar" style=" float: left; color:#337ab7">
                            <i style="padding-right:6px; padding-left:6px" class="fa fa-search fa-lg"></i>
                        </a>
                        <a href="'.route('admin.roles.edit', $roles->id).'" title="Editar" style=" float: left; color:blue">
                            <i style="padding-right:6px; padding-left:6px" class="fa fa-pencil-square-o fa-lg"></i>
                        </a>    
                        <form action="'.route('admin.roles.destroy', $roles->id).'" method="POST" class="form-delete " style="float: left;">
                            <a href="'.route('admin.roles.destroy', $roles->id).'" title="Deletar" style="color:red">
                            <i style="padding-right:6px; padding-left:6px " class="fa fa-trash-o fa-lg"></i></a>
                            <input type="hidden" name="_method" value="DELETE" >
                            '.csrf_field().'
                        </form>';
            })
            ->make(true);
    }

    public function permissions($id)
    {
        //Recupera o roles
        $role = $this->role->find($id);

        //recuperar permissões
        $permissions = $role->permissions()->get();

        return view('admin.roles.permissions', compact('role', 'permissions'));
    }

    /**
     * Show the form for creating new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Permission::checkAccess('role_create');
        $permissions = Permission::get()->pluck('name', 'id');
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Permission::checkAccess('role_create');
        $role = Role::create($request->all());
        $role->permissions()->sync(array_filter((array)$request->input('permission')));

        return redirect()->route('admin.roles.index');
    }


    /**
     * Show the form for editing Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Permission::checkAccess('role_edit');

        $permissions = Permission::get()->pluck('name', 'id');
        $role = Role::findOrFail($id);

        return view('admin.roles.create', compact('role', 'permissions'));
    }

    /**
     * Update Role in storage.
     *
     * @param  \App\Http\Requests\UpdateRolesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Permission::checkAccess('role_edit');
        $role = Role::findOrFail($id);
        $role->update($request->all());
        $role->permissions()->sync(array_filter((array)$request->input('permission')));

        return redirect()->route('admin.roles.index');
    }


    /**
     * Display Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Permission::checkAccess('role_view');
       // $users = User::where('id', $id)->get();

        $role = $this->role->findOrFail($id);
        $users = $role->users;

        return view('admin.roles.show', compact('role', 'users'));
    }


    /**
     * Remove Role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::checkAccess('role_delete');
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('admin.roles.index');
    }

    /**
     * Delete all selected Role at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        Permission::checkAccess('role_delete');
        if ($request->input('ids')) {
            $entries = Role::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


}

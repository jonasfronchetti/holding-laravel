<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PermissionController extends Controller
{
    private $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function index()
    {
        Permission::checkAccess('permission_view');

        $permissions = $this->permission->all();

        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function anyData()
    {
        $permission = Permission::query();

        return DataTables::of($permission)
            ->addColumn('action', function ($permission) {
                return '<a href="'.route('admin.permissions.show', $permission->id).'" title="Visualizar" style=" float: left; color:#337ab7">
                            <i style="padding-right:6px; padding-left:6px" class="fa fa-search fa-lg"></i>
                        </a>
                        <a href="'.route('admin.permissions.edit', $permission->id).'" title="Editar" style=" float: left; color:blue">
                            <i style="padding-right:6px; padding-left:6px" class="fa fa-pencil-square-o fa-lg"></i>
                        </a>    
                        <form action="'.route('admin.permissions.destroy', $permission->id).'" method="POST" class="form-delete " style="float: left;">
                            <a href="'.route('admin.permissions.destroy', $permission->id).'" title="Deletar" style="color:red">
                            <i style="padding-right:6px; padding-left:6px " class="fa fa-trash-o fa-lg"></i></a>
                            <input type="hidden" name="_method" value="DELETE" >
                            '.csrf_field().'
                        </form>';
            })
            ->make(true);
    }

    public function roles($id)
    {
        //Recupera a permissão
        $permission = $this->permission->find($id);

        //recuperar permissões
        $roles = $permission->roles()->get();

        return view('admin.permissions.roles', compact('permission', 'roles'));
    }

    /**
     * Show the form for creating new Permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Permission::checkAccess('permission_create');

        return view('admin.permissions.create');
    }

    /**
     * Store a newly created Permission in storage.
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Permission::checkAccess('permission_create');

        $permission = $this->permission->create($request->all());

        return redirect()->route('admin.permissions.index')->withFlashSuccess('Permissao cadastrada!');
    }


    /**
     * Show the form for editing Permission.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Permission::checkAccess('permission_edit');

        $permission = $this->permission->findOrFail($id);

        return view('admin.permissions.create', compact('permission'));
    }

    /**
     * Update Permission in storage.
     *
     * @param  \App\Http\Requests\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(\Illuminate\Http\Request $request, $id)
    {
        Permission::checkAccess('permission_edit');

        $permission = $this->permission->findOrFail($id);
        $permission->update($request->all());

        return redirect()->route('admin.permissions.index')->withFlashSuccess('Perrmissão atualizada!');
    }


    /**
     * Display Permission.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Permission::checkAccess('permission_view');

        $roles = Role::whereHas('permissions',
            function ($query) use ($id) {
                $query->where('permissions.id', $id);
            })->get();

        $permission = $this->permission->findOrFail($id);

        return view('admin.permissions.show', compact('permission', 'roles'));
    }


    /**
     * Remove Permission from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::checkAccess('permission_delete');

        $permission = $this->permission->findOrFail($id);
        $permission->delete();

        return redirect()->route('admin.permissions.index');
    }

    /**
     * Delete all selected Permission at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        Permission::checkAccess('permission_delete');

        if ($request->input('ids')) {
            $entries = $this->permission->whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


}

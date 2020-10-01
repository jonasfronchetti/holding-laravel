<?php

namespace App\Policies;

use App\Models\Admin\Permission;
use App\User;
use App\Empresa;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmpresaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the empresa.
     *
     * @param  \App\User  $user
     * @param  \App\Empresa  $empresa
     * @return mixed
     */
    public function view(User $user, Empresa $empresa)
    {
        $permissions = Permission::with('roles')->get();

        return $user->hasPermission($permissions[1]);
    }

    /**
     * Determine whether the user can create empresas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the empresa.
     *
     * @param  \App\User  $user
     * @param  \App\Empresa  $empresa
     * @return mixed
     */
    public function update(User $user, Empresa $empresa)
    {
        //
    }

    /**
     * Determine whether the user can delete the empresa.
     *
     * @param  \App\User  $user
     * @param  \App\Empresa  $empresa
     * @return mixed
     */
    public function delete(User $user, Empresa $empresa)
    {
        //
    }
}

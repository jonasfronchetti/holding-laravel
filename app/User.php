<?php

namespace App;

use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use App\Models\Basico\Pessoa;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'logo', 'pessoa_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /*public function empresas()
    {
        return $this->belongsToMany(Empresa::class, 'user_empresa', 'user_id', 'empresa_id');
    }*/

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function hasPermission(Permission $permission)
    {
        return $this->hasAnyRoles($permission->roles);
    }

    public function hasAnyRoles($roles)
    {
        if(is_array($roles) || is_object($roles) ) {
            return !! $roles->intersect($this->roles)->count();
        }

        return $this->roles->contains('name', $roles);
    }
}

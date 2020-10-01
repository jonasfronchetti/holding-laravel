<?php

namespace App\Providers;

use App\Models\Admin\Permission;
use App\User;
use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
//        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if( Schema::hasTable('permissions') )
        {
            $permissions = Permission::with('roles')->get();
            foreach( $permissions as $permission ) {
                Gate::define($permission->name, function(User $user) use ($permission){
                    return $user->hasPermission($permission);
                });
            }
        }
        Gate::before(function(User $user, $ability){

            if ( $user->hasAnyRoles('admin') )
                return true;

        });

    }
}

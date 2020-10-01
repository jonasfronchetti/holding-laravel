<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Gate;
use OwenIt\Auditing\Contracts\Auditable;

class Permission extends Model implements Auditable
{
    protected $fillable = ['name', 'label'];

    use \OwenIt\Auditing\Auditable;

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'name', 'label'
    ];
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public static function checkAccess($permission)
    {
        if ( Gate::denies($permission) )
            abort(403, 'Sem autorização');
    }
}

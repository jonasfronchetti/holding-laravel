<?php

namespace App\Models\Basico;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Pais extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'bas_pais';

    protected $fillable = [
        'nome',
        'codigo',
    ];

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'name',
        'codigo'
    ];

    public function estados()
    {
        return $this->hasMany(Estado::class);
    }
}

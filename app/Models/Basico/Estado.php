<?php

namespace App\Models\Basico;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Estado extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'bas_estados';

    protected $fillable = [
        'nome',
        'uf',
        'codigo',
        'pais_id',
    ];

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'nome',
        'uf',
        'codigo',
        'pais_id',
    ];

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    public function cidades()
    {
        return $this->hasMany(Cidade::class);
    }

}

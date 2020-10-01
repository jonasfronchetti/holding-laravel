<?php

namespace App\Models\Basico;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Cidade extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'bas_cidades';

    protected $fillable = [
        'nome',
        'estado_id',
        'ibge',
    ];

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'nome',
        'estado_id',
        'ibge',
    ];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

}

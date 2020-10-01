<?php

namespace App\Models\Financeiro;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Historico extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'fin_historicos';

    protected $fillable = [
        'nome',
        'tipo',
    ];

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'name',
        'tipo'
    ];

}

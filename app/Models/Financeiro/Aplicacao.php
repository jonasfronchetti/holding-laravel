<?php

namespace App\Models\Financeiro;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Aplicacao extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'fin_aplicacoes';

    protected $fillable = [
        'tipo',
        'nome',
        'percrendimento',
    ];


    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'tipo',
        'nome',
        'percrendimento',
    ];
}

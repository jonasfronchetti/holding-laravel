<?php

namespace App\Models\Financeiro;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Movimento extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'fin_movimentos';

    protected $fillable = [
        'valor',
        'data',
        'historico_id',
        'tipo',
        'aporte_id',
        'pessoa_id',
    ];

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'valor',
        'data',
        'historico_id',
        'tipo',
        'aporte_id',
        'pessoa_id',
    ];

}

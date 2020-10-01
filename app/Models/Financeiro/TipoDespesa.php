<?php

namespace App\Models\Financeiro;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TipoDespesa extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'fin_tipo_despesas';

    protected $fillable = [
        'nome',
    ];

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'name',
    ];

}

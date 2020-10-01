<?php

namespace App\Models\Financeiro;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Investimento extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'fin_investimentos';

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

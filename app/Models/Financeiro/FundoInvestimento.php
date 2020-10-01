<?php

namespace App\Models\Financeiro;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class FundoInvestimento extends Model implements Auditable
{
    protected $table = 'fin_fundo_investimentos';

    protected $fillable = [
        'valor',
        'data',
        'investimento_id',
        'detalhes',
        'usuario_id',
    ];

    use \OwenIt\Auditing\Auditable;

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'valor',
        'data',
        'investimento_id',
        'detalhes',
        'usuario_id',
    ];

}

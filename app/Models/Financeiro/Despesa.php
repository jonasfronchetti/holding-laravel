<?php

namespace App\Models\Financeiro;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Despesa extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'fin_despesas';

    protected $fillable = [
        'numero',
        'descricao',
        'fornecedor_id',
        'pessoa_id',
        'tipodespesa_id',
        'data',
        'valor',
    ];

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'numero',
        'descricao',
        'fornecedor_id',
        'pessoa_id',
        'tipodespesa_id',
        'data',
        'valor',
    ];

}

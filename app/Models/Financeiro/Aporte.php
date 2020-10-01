<?php

namespace App\Models\Financeiro;

use App\Models\Basico\Pessoa;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Aporte extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'fin_aportes';

    protected $fillable = [
        'pessoa_id',
        'data',
        'valor',
        'rendimento',
        'saldo',
        'situacao',
        'aplicacao_id',
        'ativo',
        'update_rendimento'
    ];

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'pessoa_id',
        'data',
        'valor',
        'rendimento',
        'saldo',
        'situacao',
        'aplicacao_id',
        'ativo',
        'update_rendimento'
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }
}

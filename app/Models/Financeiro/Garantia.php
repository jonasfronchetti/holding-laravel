<?php

namespace App\Models\Financeiro;

use App\Models\Basico\Pessoa;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Garantia extends Model implements Auditable
{
    protected $table = 'fin_garantias';

    protected $fillable = [
        'pessoa_id',
        'nome',
        'valor',
        'rendimento',
        'data',
        'ativo',
        'update_rendimento'
        ];

    use \OwenIt\Auditing\Auditable;

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'pessoa_id',
        'nome',
        'valor',
        'rendimento',
        'data',
        'ativo',
        'update_rendimento'
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }
}

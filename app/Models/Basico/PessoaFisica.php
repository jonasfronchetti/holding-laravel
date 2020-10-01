<?php

namespace App\Models\Basico;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class PessoaFisica extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'bas_pessoas_fisicas';

    protected $fillable = [
        'pessoa_id',
        'cpf',
        'rg',
    ];

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'pessoa_id',
        'cpf',
        'rg',
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }
}

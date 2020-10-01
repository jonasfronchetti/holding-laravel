<?php

namespace App\Models\Basico;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class PessoaJuridica extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'bas_pessoas_juridicas';

    protected $fillable = [
        'pessoa_id',
        'ifederal',
        'iestadual',
        'imunicipal',
        'nomefantasia',
    ];

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'pessoa_id',
        'ifederal',
        'iestadual',
        'imunicipal',
        'nomefantasia',
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

}

<?php

namespace App\Models\Basico;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Pessoa extends Model implements Auditable
{
    protected $table = 'bas_pessoas';

    protected $fillable = [
        'nome',
        'tipopessoa',
        'dtcadastro',
        'ativo',
        'logadouro',
        'numero',
        'complemento',
        'bairro',
        'cep',
        'cidade_id',
        'telefone',
        'celular',
        'email',
    ];

    use \OwenIt\Auditing\Auditable;

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'nome',
        'tipopessoa',
        'dtcadastro',
        'ativo',
        'logadouro',
        'numero',
        'complemento',
        'bairro',
        'cep',
        'cidade_id',
        'telefone',
        'celular',
        'email',
    ];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

}

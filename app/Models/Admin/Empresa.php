<?php

namespace App\Models\Admin;

use App\Models\Basico\Cidade;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Empresa extends Model  implements Auditable
{
    protected $table = 'bas_empresas';

    protected $fillable = [
        'nome',
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
        'ifederal',
        'iestadual',
        'imunicipal',
        'nomefantasia',
        'codigoregimetributario',
        'logo',
        'cnae_id',
        'hash',
    ];
    use \OwenIt\Auditing\Auditable;

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'nome',
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
        'ifederal',
        'iestadual',
        'imunicipal',
        'nomefantasia',
        'codigoregimetributario',
        'logo',
        'cnae_id',
        'hash',
    ];


    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

}

<?php

namespace App\Models\Basico;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use OwenIt\Auditing\Contracts\Auditable;

class Configuracao extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'bas_configuracoes';

    protected $fillable = [
        'empresa_id',
        'parametro',
        'valor',
        'descricao',
    ];

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'empresa_id',
        'parametro',
        'valor',
        'descricao',
    ];

    public static function getConfiguracao($parametro)
    {
        $configuracao = Configuracao::where('parametro', $parametro)->first();

        $value = $configuracao->valor;

        return $value;
    }

}

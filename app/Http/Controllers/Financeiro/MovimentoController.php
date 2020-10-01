<?php

namespace App\Http\Controllers\Financeiro;

use App\Models\Financeiro\Movimento;
use App\Http\Controllers\Controller;

class MovimentoController extends Controller
{

    private $movimentos;

    /**
     * MovimentoController constructor.
     * @param Movimento $movimentos
     */
    public function __construct(Movimento $movimentos)
    {
        $this->movimentos = $movimentos;
    }

    /**
     * @param $dataForm
     * @param $aporte
     */
    public static function salvaMovimentoAporte($dataForm, $aporte)
    {
        $dataForm['historico_id'] = 1;
        $dataForm['tipo'] = 'C';
        $dataForm['aporte_id'] = $aporte->id;
        Movimento::create($dataForm);

        $dataForm['historico_id'] = 6;
        $dataForm['tipo'] = 'D';
        $dataForm['aporte_id'] = $aporte->id;
        Movimento::create($dataForm);

    }

    //public

}

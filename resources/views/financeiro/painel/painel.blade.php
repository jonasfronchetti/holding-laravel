@extends('sistema.template.formbusca')
@section('title', 'Painel do Cliente')

@section('content_header')
    <h1>
        Painel do Cliente
    </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body box-profile">

                    <h3 class="text-center">Aportes</h3>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <h3><b>Montante: <a class="pull-right">{{ number_format($aportes->saldo, 2, ',', '.') }}</a></b></h3>
                        </li>
                        <li class="list-group-item">
                            <h3><b>Rendimentos: <a class="pull-right">{{ number_format($aportes->rendimento, 2, ',', '.') }}</a></b></h3>
                        </li>
                        <li class="list-group-item">
                            <h3><b>Acumulado: <a class="pull-right">{{ number_format($aportes->saldo + $aportes->rendimento, 2, ',', '.') }}</a></b></h3>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body box-profile">

                    <h3 class="text-center">Movimentação</h3>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <h3><b>Saldo: <a class="pull-right">{{ number_format($movimentos->valor, 2, ',', '.') }}</a></b></h3>
                        </li>
                        <li class="list-group-item">
                            <h3><b>Bloqueado: <a class="pull-right">{{ number_format($movimentos->bloqueado, 2, ',', '.') }}</a></b></h3>
                        </li>
                        <li class="list-group-item">
                            <h3><b>Disponivel: <a class="pull-right">{{ number_format($movimentos->valor - $movimentos->bloqueado, 2, ',', '.') }}</a></b></h3>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

    </div>
@stop

@extends('sistema.template.formbusca')
@section('title', 'Painel do Cliente')

@section('content_header')
    <h1>
        Aportes
    </h1>
@stop

@section('content')

    <div class="row">
        @foreach($aportes as $aporte)
            <div class="col-md-4">
                <div class="box box-widget widget-user-2">

                    <div class="widget-user-header" style="background-color: #FFD700">
                        <h4 class="description-header pull-left"><b>{{$aporte->id}}</b></h4>
                        @if(! $aporte->ativo)
                            <h6 class="pull-right">inativo</h6>
                        @endif
                        <h4 class="widget-user-username ">{{$aporte->pessoa->nome}}</h4>


                    </div>
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li><a>Aporte:<span class="pull-right">{{ number_format($aporte->valor, 2, ',', '.') }}</span></a></li>
                            <li><a>{{date('d/m/Y', strtotime($aporte->data))}} ({{ date_diff(date_create(date('Y-m-d')), date_create($aporte->data))->format("%a") . ' dias'}})
                                    <span class="pull-right">{{ number_format($aporte->rendimento, 2, ',', '.') }}</span></a></li>
                            <li><a>Soma:<span class="pull-right">{{ number_format($aporte->valor + $aporte->rendimento, 2, ',', '.') }}</span></a></li>
                            <li><a>
                                    <button type="submit" class="btn btn-danger">Resgatar</button>
                                    <span class="pull-right"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach($garantias as $garantia)
            <div class="col-md-4">
                <div class="box box-widget widget-user-2">

                    <div class="widget-user-header" style="background-color: #c0c0c0">
                        <h4 class="description-header pull-left"><b>{{$garantia->id}}</b></h4>
                        @if(! $garantia->ativo)
                            <h6 class="pull-right">inativo</h6>
                        @endif
                        <h4 class="widget-user-username ">{{$garantia->pessoa->nome}}</h4>


                    </div>
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li><a>Valor imovel:<span class="pull-right">{{ number_format($garantia->valor, 2, ',', '.') }}</span></a></li>
                            <li><a>{{date('d/m/Y', strtotime($garantia->data))}} ({{ date_diff(date_create(date('Y-m-d')), date_create($garantia->data))->format("%a") . ' dias'}})
                                    <span class="pull-right">{{ number_format($garantia->rendimento, 2, ',', '.') }}</span></a></li>
                            <li><a>Soma:<span class="pull-right">{{ number_format($garantia->valor + $garantia->rendimento, 2, ',', '.') }}</span></a></li>
                            <li><a>
                                    <button type="submit" class="btn btn-danger" style="visibility: hidden">Resgatar</button>
                                    <span class="pull-right"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
@stop

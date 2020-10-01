@extends('sistema.template.formcadastro')

@section('title', 'Produto')
@section('url_voltar', route('estoque.movimentos.index'))

@section('content')
    @if (isset($movimento))
        {!! Form::model($movimento, ['route' => ['estoque.movimentos.update', $mov->id], 'class' => 'form-horizontal', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'estoque.movimentos.store', 'class' => 'form-horizontal']) !!}
    @endif

    @include('sistema.template.botoescadastro')


    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Comanda</h3>
                    <div class="box-tools pull-right">
                    </div>
                </div>
                <div class="box-body">
                    <div class="box-body">
                        @include('sistema.componentes.texto', ['id' => 'qrcode', 'label' => 'Registrar'])
                        @include('sistema.componentes.texto', ['id' => 'numero', 'label' => 'Sequencia', 'attributes' => ['readonly' => 'true']])
                        @include('sistema.componentes.texto', ['id' => 'quantidade', 'label' => 'Peso'])
                        @include('sistema.componentes.texto', ['id' => 'valortotal', 'label' => 'Total'])
                        @include('sistema.componentes.selecionaPessoa', ['id' => 'pessoa_id', 'label' => 'Cliente' ])
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                    <div class="box-tools pull-right">
                    </div>
                </div>
                <div class="box-body">
                    <div class="info-box">
                        <span class="info-box-icon bg-black"><i class="fa fa-cutlery"></i></span>

                        <div class="info-box-content">
                            @if (isset($movimento)) <h3>Comanda registrada com sucesso</h3> @endif
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-4 col-xs-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-pricetag-outline"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Valor por kilo</span>
                                    <span class="info-box-number">R$ {{isset($movimento) ? $movimento['valorunitario'] : '0,00'}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-orange-active"><i class="ion ion-ios-cart-outline"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Peso</span>
                                    <span class="info-box-number">{{isset($movimento) ? $movimento['quantidade'] : '0,0000'}} kg/L</span>
                                </div>

                            </div>

                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Valor total</span>
                                    <span class="info-box-number">R$ {{isset($movimento) ? $movimento['valortotal'] : '0,00'}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p><br>
                </div>
            </div>
        </div>


    </div>


    <!--
    <div class="box box-primary collapsed-box" id="div{ {$produto['model']}}">
        <div class="box-header with-border">
            <h3 class="box-title">Produtos</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="btn btn-primary fa fa-plus" id="i{ {$produto['model']}}"></i>
                </button>
            </div>
        </div>
        @ include('sistema.componentes.subDetail', ['items' => $produto,
            'components' => array(
                ['type' => 'sistema.componentes.textoCurto', 'properties' => ['id' => 'produto_id', 'label' => 'Produto']],
                ['type' => 'sistema.componentes.textoCurto', 'properties' => ['id' => 'quantidade', 'label' => 'Quantidade']],
                ['type' => 'sistema.componentes.textoCurto', 'properties' => ['id' => 'valorunitario', 'label' => 'Valor Unitario']],
                ['type' => 'sistema.componentes.textoCurto', 'properties' => ['id' => 'valortotal', 'label' => 'Total']])
            ] )
    </div>-->
    {!! Form::close() !!}
@stop


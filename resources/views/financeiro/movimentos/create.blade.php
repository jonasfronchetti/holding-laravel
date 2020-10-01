@extends('sistema.template.formcadastro')

@section('title', 'Produto')
@section('url_voltar', route('aplicacoes'))

@section('content')
    @if (isset($data))
        {!! Form::model($data, ['route' => ['estoque.produtos.update', $data->id], 'class' => 'form-horizontal', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'estoque.produtos.store', 'class' => 'form-horizontal']) !!}
    @endif

    @include('sistema.template.botoescadastro')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Produto</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="btn btn-primary fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            @include('sistema.componentes.texto', ['id' => 'nome', 'label' => 'Nome'])
            @include('sistema.componentes.selecionaUnidade', ['id' => 'unidade_id', 'label' => 'Unidade'])
            @include('sistema.componentes.selecionaCurto', ['id' => 'tipo', 'label' => 'Tipo',
                                                            'values' => ['1' => 'Mercadoria', '2' => 'Serviço']
                                                            ])
            @include('sistema.componentes.textoCurto', ['id' => 'codigobarras', 'label' => 'Código de Barras'])
            @include('sistema.componentes.numerico', ['id' => 'valorunitario', 'label' => 'Valor Unitário',
                                                      'attributes' => ['step' => '0.01']])
            @include('sistema.componentes.selecionaClFiscal', ['id' => 'clfiscal_id', 'label' => 'Classificação Fiscal'])
        </div>
    </div>
    {!! Form::close() !!}
@stop



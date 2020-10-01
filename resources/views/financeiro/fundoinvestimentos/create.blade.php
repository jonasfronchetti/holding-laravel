@extends('sistema.template.formcadastro')

@section('title', 'Aplicações')
@section('url_voltar', route('financeiro.fundoinvestimentos.index'))

@section('content')
    @if (isset($data))
        {!! Form::model($data, ['route' => ['financeiro.fundoinvestimentos.update', $data->id], 'class' => 'form-horizontal', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'financeiro.fundoinvestimentos.store', 'class' => 'form-horizontal']) !!}
    @endif

    @include('sistema.template.botoescadastro')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Aplicação</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="btn btn-primary fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            @include('sistema.componentes.data', ['id' => 'data', 'label' => 'Data'])
            @include('sistema.componentes.selecionaInvestimento', ['id' => 'investimento_id', 'label' => 'Investimento', 'size' => 'Curto'])
            @include('sistema.componentes.numerico', ['id' => 'valor', 'label' => 'Valor',
                                                      'attributes' => ['step' => '0.01']])
            @include('sistema.componentes.texto', ['id' => 'detalhes', 'label' => 'Detalhes'])

        </div>
    </div>
    {!! Form::close() !!}
@stop



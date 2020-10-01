@extends('sistema.template.formcadastro')

@section('title', 'Aporte')
@section('url_voltar', route('financeiro.aportes.index'))

@section('content')
    @if (isset($data))
        {!! Form::model($data, ['route' => ['financeiro.aportes.update', $data->id], 'class' => 'form-horizontal', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'financeiro.aportes.store', 'class' => 'form-horizontal']) !!}
    @endif

    @include('sistema.template.botoescadastro')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Aporte</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="btn btn-primary fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            @include('sistema.componentes.selecionaPessoa', ['id' => 'pessoa_id', 'label' => 'Cliente'])
            @include('sistema.componentes.data', ['id' => 'data', 'label' => 'Data'])
            @include('sistema.componentes.numerico', ['id' => 'valor', 'label' => 'Valor',
                                                      'attributes' => ['step' => '0.01']])
            @include('sistema.componentes.selecionaAplicacao', ['id' => 'aplicacao_id', 'label' => 'Aplicação'])
            @can('aporte_active')
                @include('sistema.componentes.checkBox', ['id' => 'ativo', 'label' => 'Ativo'])
            @endcan
        </div>
    </div>
    {!! Form::close() !!}
@stop



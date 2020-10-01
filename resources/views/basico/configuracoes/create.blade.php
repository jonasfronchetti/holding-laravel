@extends('sistema.template.formcadastro')

@section('title', 'Produto')
@section('url_voltar', route('basico.configuracoes.index'))

@section('content')
    @if (isset($data))
        {!! Form::model($data, ['route' => ['basico.configuracoes.update', $data->id], 'class' => 'form-horizontal', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'basico.configuracoes.store', 'class' => 'form-horizontal']) !!}
    @endif

    @include('sistema.template.botoescadastro')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Configuração</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="btn btn-primary fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            @include('sistema.componentes.textoCurto', ['id' => 'parametro', 'label' => 'Parametro'])
            @include('sistema.componentes.textoCurto', ['id' => 'valor', 'label' => 'Valor'])
            @include('sistema.componentes.texto', ['id' => 'descricao', 'label' => 'Descrição'])
        </div>
    </div>
    {!! Form::close() !!}
@stop



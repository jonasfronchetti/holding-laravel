@extends('sistema.template.formcadastro')

@section('title', 'Tipos de Despesas')
@section('url_voltar', route('financeiro.tipodespesas.index'))

@section('content')
    @if (isset($data))
        {!! Form::model($data, ['route' => ['financeiro.tipodespesas.update', $data->id], 'class' => 'form-horizontal', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'financeiro.tipodespesas.store', 'class' => 'form-horizontal']) !!}
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
            @include('sistema.componentes.texto', ['id' => 'nome', 'label' => 'Nome'])
        </div>
    </div>
    {!! Form::close() !!}
@stop



@extends('sistema.template.formcadastro')

@section('title', 'Garantia')
@section('url_voltar', route('financeiro.garantias.index'))

@section('content')
    @if (isset($data))
        {!! Form::model($data, ['route' => ['financeiro.garantias.update', $data->id], 'class' => 'form-horizontal', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'financeiro.garantias.store', 'class' => 'form-horizontal']) !!}
    @endif

    @include('sistema.template.botoescadastro')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Garantia</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="btn btn-primary fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            @include('sistema.componentes.selecionaPessoa', ['id' => 'pessoa_id', 'label' => 'Cliente'])
            @include('sistema.componentes.texto', ['id' => 'nome', 'label' => 'Nome'])
            @include('sistema.componentes.data', ['id' => 'data', 'label' => 'Data'])
            @include('sistema.componentes.numerico', ['id' => 'valor', 'label' => 'Valor',
                                                      'attributes' => ['step' => '0.01']])
        </div>
    </div>
    {!! Form::close() !!}
@stop



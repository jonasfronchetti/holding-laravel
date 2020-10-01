@extends('sistema.template.formcadastro')

@section('title', 'Despesas')
@section('url_voltar', route('financeiro.despesas.index'))

@section('content')
    @if (isset($data))
        {!! Form::model($data, ['route' => ['financeiro.despesas.update', $data->id], 'class' => 'form-horizontal', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'financeiro.despesas.store', 'class' => 'form-horizontal']) !!}
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
            @include('sistema.componentes.numerico', ['id' => 'numero', 'label' => 'NF/Cupom'])
            @include('sistema.componentes.data', ['id' => 'data', 'label' => 'Data'])
            @include('sistema.componentes.selecionaPessoa', ['id' => 'fornecedor_id', 'label' => 'Fornecedor', 'size' => 'Curto'])
            @include('sistema.componentes.selecionaPessoa', ['id' => 'pessoa_id', 'label' => 'Pessoa', 'size' => 'Curto'])
            @include('sistema.componentes.selecionaTipoDespesa', ['id' => 'tipodespesa_id', 'label' => 'Tipo de Despesa', 'size' => 'Curto'])
            @include('sistema.componentes.numerico', ['id' => 'valor', 'label' => 'Valor',
                                                      'attributes' => ['step' => '0.01']])
            @include('sistema.componentes.texto', ['id' => 'descricao', 'label' => 'Descrição'])



        </div>
    </div>
    {!! Form::close() !!}
@stop

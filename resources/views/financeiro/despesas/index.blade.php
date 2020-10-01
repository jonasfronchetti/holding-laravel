@extends('sistema.template.formbusca')
@section('title', 'Despesas')

@section('content_header')
    @parent
    @section('nome_form', 'Cadastro de Despesas')
@stop

@section('content')
    @parent
    @can('despesa_create')
        @section('url_inserir', route('financeiro.despesas.create'))
    @endcan

@include('sistema.componentes.gridBusca',
        ['colunas' =>   array('id' => 'Código', 'descricao' => 'Descrição', 'data' => 'Data', 'pessoa_id' => 'Pessoa', 'valor' => 'Valor'),
                        'routeName' => 'financeiro.despesa.getdata',
                        'actions' => array()
        ])

@stop

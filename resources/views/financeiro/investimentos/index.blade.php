@extends('sistema.template.formbusca')
@section('title', 'Investimentos')

@section('content_header')
    @parent
    @section('nome_form', 'Cadastro de Investimentos')
@stop

@section('content')
    @parent
    @can('investimento_create')
        @section('url_inserir', route('financeiro.investimentos.create'))
    @endcan

@include('sistema.componentes.gridBusca',
        ['colunas' =>   array('id' => 'Código', 'nome' => 'Nome'),
                        'routeName' => 'financeiro.investimento.getdata',
                        'actions' => array()
        ])

@stop

@extends('sistema.template.formbusca')
@section('title', 'Fundo de Investimentos')

@section('content_header')
    @parent
    @section('nome_form', 'Fundo de Investimentos')
@stop

@section('content')
    @parent
    @can('fundo_investimento_create')
        @section('url_inserir', route('financeiro.fundoinvestimentos.create'))
    @endcan

@include('sistema.componentes.gridBusca',
        ['colunas' =>   array('id' => 'Código', 'data' => 'Data', 'investimento_id' => 'Investimento', 'valor' => 'Valor', 'detalhes' => 'Detalhes'),
                        'routeName' => 'financeiro.fundoinvestimento.getdata',
                        'actions' => array()
        ])

@stop

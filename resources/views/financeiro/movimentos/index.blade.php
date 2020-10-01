@extends('sistema.template.formbusca')
@section('title', 'Produtos')

@section('content_header')
    @parent
    @section('nome_form', 'Cadastro de Movimentos')
@stop

@section('content')
    @parent
    @can('produto_create')
        @section('url_inserir', route('estoque.movimentos.create'))
    @endcan

@include('sistema.componentes.gridBusca',
        ['colunas' =>   array('id' => 'Código','numero' => 'Número', 'serie' => 'Serie', 'pessoa_id' => 'Cliente', 'dhmovto' => 'Data hora', 'valortotal' => ' Valor'),
                        'routeName' => 'financeiro.movimento.getdata',
                        'actions' => array()
        ])

@stop

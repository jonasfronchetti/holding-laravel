@extends('sistema.template.formbusca')
@section('title', 'Aplicações')

@section('content_header')
    @parent
    @section('nome_form', 'Cadastro de Aplicações')
@stop

@section('content')
    @parent
    @can('aplicacao_create')
        @section('url_inserir', route('financeiro.aplicacoes.create'))
    @endcan

@include('sistema.componentes.gridBusca',
        ['colunas' =>   array('id' => 'Código', 'nome' => 'Nome', 'percrendimento' => 'Rendimento'),
                        'routeName' => 'financeiro.aplicacao.getdata',
                        'actions' => array()
        ])

@stop

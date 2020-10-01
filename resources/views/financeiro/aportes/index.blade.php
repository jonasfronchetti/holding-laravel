@extends('sistema.template.formbusca')
@section('title', 'Aportes')

@section('content_header')
    @parent
    @section('nome_form', 'Cadastro de Aportes')
@stop

@section('content')
    @parent
    @can('aporte_create')
        @section('url_inserir', route('financeiro.aportes.create'))
    @endcan

@include('sistema.componentes.gridBusca',
        ['colunas' =>   array('id' => 'Código', 'data' => 'Data', 'pessoa_id' => 'Cliente', 'saldo' => 'Saldo', 'rendimento' => 'Rendimento', 'ativo' => 'Ativo'),
                        'routeName' => 'financeiro.aporte.getdata',
                        'actions' => array()
        ])

@stop

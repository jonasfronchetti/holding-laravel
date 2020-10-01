@extends('sistema.template.formbusca')
@section('title', 'Garantia')

@section('content_header')
    @parent
    @section('nome_form', 'Cadastro de Garantia')
@stop

@section('content')
    @parent
    @can('garantia_create')
        @section('url_inserir', route('financeiro.garantias.create'))
    @endcan

@include('sistema.componentes.gridBusca',
        ['colunas' =>   array('id' => 'Código', 'data' => 'Data', 'pessoa_id' => 'Cliente', 'valor' => 'Valor'),
                        'routeName' => 'financeiro.garantia.getdata',
                        'actions' => array()
        ])

@stop

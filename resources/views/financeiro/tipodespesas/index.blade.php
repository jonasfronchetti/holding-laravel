@extends('sistema.template.formbusca')
@section('title', 'Tipos de Despesas')

@section('content_header')
    @parent
    @section('nome_form', 'Cadastro de Tipos de Despesas')
@stop

@section('content')
    @parent
    @can('tipodespesa_create')
        @section('url_inserir', route('financeiro.tipodespesas.create'))
    @endcan

@include('sistema.componentes.gridBusca',
        ['colunas' =>   array('id' => 'Código', 'nome' => 'Nome'),
                        'routeName' => 'financeiro.tipodespesa.getdata',
                        'actions' => array()
        ])

@stop

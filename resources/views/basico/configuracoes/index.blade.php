@extends('sistema.template.formbusca')
@section('title', 'Configurações')

@section('content_header')
    @parent
    @section('nome_form', 'Configurações')
@stop

@section('content')
    @parent
    @can('configuracao_create')
        @section('url_inserir', route('basico.configuracoes.create'))
    @endcan

@include('sistema.componentes.gridBusca',
        ['colunas' =>   array('parametro' => 'Parametro', 'valor' => 'Valor', 'descricao' => 'Descricão'),
                        'routeName' => 'basico.configuracao.getdata',
                        'actions' => array()
        ])

@stop

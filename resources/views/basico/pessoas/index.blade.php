@extends('sistema.template.formbusca')
@section('title', 'Pessoas')

@section('content_header')
    @parent
    @section('nome_form', 'Cadastro de Pessoa')
@stop

@section('content')
    @parent
    @can('pessoa_create')
        @section('url_inserir', route('basico.pessoas.create'))
    @endcan

@include('sistema.componentes.gridBusca',
        ['colunas' =>   array('id' => 'Código', 'nome' => 'Nome', 'cidade_id' => 'Cidade'),
                        'routeName' => 'basico.pessoa.getdata',
                        'actions' => array(
                                           )
        ])

@stop

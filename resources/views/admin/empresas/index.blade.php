@extends('sistema.template.formbusca')
@section('title', 'Emitentes')

@section('content_header')
    @parent
    @section('nome_form', 'Empresa')
@stop

@section('content')
    @parent
    @can('admin')
        @section('url_inserir', route('admin.empresas.create'))
    @endcan

@include('sistema.componentes.gridBusca',
        ['colunas' =>   array('id' => 'Código', 'nome' => 'Nome', 'nomefantasia' => 'Nome Fantasia'),
                        'routeName' => 'admin.empresa.getdata',
                        'actions' => array(//array('admin.empresas.edit', 'fa fa-pencil-square-o fa-lg', 'Editar', 'blue'),
                                           //array('admin.empresas.create', 'fa fa-trash-o fa-lg', 'Excluir', 'red')
                                           )
        ])

@stop

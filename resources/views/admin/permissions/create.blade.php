@extends('sistema.template.formcadastro')

@section('url_voltar', route('admin.permissions.index'))

@section('content')
    @if (isset($permission))
        {!! Form::model($permission, ['route' => ['admin.permissions.update', $permission->id], 'class' => 'form-horizontal', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    @else
        {!! Form::open(['method' => 'POST', 'route' => ['admin.permissions.store']]) !!}
    @endif

    @include('sistema.template.botoescadastro')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Permissão</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            @include('sistema.componentes.texto', ['id' => 'name', 'label' => 'Nome'])
            @include('sistema.componentes.texto', ['id' => 'label', 'label' => 'Descrição'])
        </div>
    </div>


    {!! Form::close() !!}
@stop


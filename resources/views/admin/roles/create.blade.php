@extends('sistema.template.formcadastro')

@section('title', trans('global.roles.title'))

@section('content')
    @if (isset($role))
        {!! Form::model($role, ['route' => ['admin.roles.update', $role->id], 'class' => 'form-horizontal', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'admin.roles.store', 'class' => 'form-horizontal']) !!}
    @endif

    @section('url_voltar', route('admin.roles.index'))
    @include('sistema.template.botoescadastro')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Empresa</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            @include('sistema.componentes.texto', ['id' => 'name', 'label' => 'Nome'])
            @include('sistema.componentes.texto', ['id' => 'label', 'label' => 'Descrição'])
            @include('sistema.componentes.seleciona', ['id' => 'permission[]', 'label' => 'Permissões',
                                                   'values' => $permissions,
                                                   'selects' => (old('permission') ? old('permission') : isset($role) ? $role->permissions->pluck('id')->toArray() : null),
                                                   'attributes' => ['class' => 'js-basic-multiple form-control', 'multiple' => 'multiple', 'required' => '']])
        </div>
    </div>
    {!! Form::close() !!}
@stop



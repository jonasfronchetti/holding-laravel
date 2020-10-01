@extends('sistema.template.formcadastro')

@section('title', trans('global.users.title'))

@section('content')
    @if (isset($user))
        {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'class' => 'form-horizontal', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'admin.users.store', 'class' => 'form-horizontal']) !!}
    @endif

    @section('url_voltar', route('admin.users.index'))
    @include('sistema.template.botoescadastro')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Usuário</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            @include('sistema.componentes.texto', ['id' => 'name', 'label' => 'Nome'])
            @include('sistema.componentes.texto', ['id' => 'email', 'label' => 'E-mail'])
            @include('sistema.componentes.arquivo', ['id' => 'logo', 'label' => 'Logo'])
            @include('sistema.componentes.senha', ['id' => 'password', 'label' => 'Senha'])
            @include('sistema.componentes.seleciona', ['id' => 'role[]', 'label' => 'Funções',
                                                   'values' => $roles,
                                                   'selects' => (old('role') ? old('role') : isset($user) ? $user->roles->pluck('id')->toArray() : null),
                                                   'attributes' => ['class' => 'js-basic-multiple form-control', 'multiple' => 'multiple', 'required' => '']])
        </div>
    </div>

    {!! Form::close() !!}
@stop



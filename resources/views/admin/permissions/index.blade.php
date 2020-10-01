@inject('request', 'Illuminate\Http\Request')
@extends('sistema.template.formbusca')
@section('title', 'Permissões')

@section('content_header')
    @parent
    @section('nome_form', 'Cadastro de Permissões')
@stop

@section('content')
    @parent
    @can('permission_create')
        @section('url_inserir', route('admin.permissions.create'))
    @endcan

    @include('sistema.componentes.gridBusca',
            ['colunas' =>   array('id' => 'Código', 'name' => 'Nome', 'label' => 'Descrição'),
                            'routeName' => 'admin.permission.getdata',
                            'actions' => []
            ])

@stop

@section('before-scripts-end')
    @parent
    <script>
        @can('permission_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.permissions.mass_destroy') }}';
        @endcan
    </script>
@endsection
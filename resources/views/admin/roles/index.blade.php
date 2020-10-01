@inject('request', 'Illuminate\Http\Request')
@extends('sistema.template.formbusca')
@section('title', 'Grupos de Permissões')

@section('content_header')
    @parent
    @section('nome_form', 'Cadastro de Funções')
@stop

@section('content')
    @parent
    @can('role_create')
    <p>
        @section('url_inserir', route('admin.roles.create'))
    </p>
    @endcan

    @include('sistema.componentes.gridBusca',
            ['colunas' =>   array('id' => 'Código', 'name' => 'Nome', 'label' => 'Descrição'),
                            'routeName' => 'admin.role.getdata',
                            'actions' => []
            ])

@stop

@section('after-scripts-end')
    @parent
    <script>
        @can('role_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.roles.mass_destroy') }}';
        @endcan
    </script>
@endsection
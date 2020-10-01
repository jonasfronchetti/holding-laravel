@inject('request', 'Illuminate\Http\Request')
@extends('sistema.template.formbusca')
@section('title', trans('global.users.title'))

@section('content_header')
    @parent
    @section('nome_form', 'Cadastro de Usuários')
@stop

@section('content')
    @parent
    @can('user_create')
        @section('url_inserir', route('admin.users.create'))
    @endcan

    @include('sistema.componentes.gridBusca',
            ['colunas' =>   array('id' => 'Código', 'name' => 'Nome', 'email' => 'E-mail'),
                            'routeName' => 'admin.user.getdata',
                            'actions' => []
            ])

@stop

@section('after-scripts-end')
    @parent
    <script>
        @can('user_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
        @endcan
    </script>
@endsection
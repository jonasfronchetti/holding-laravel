@extends('sistema.template.formbusca')
@section('content_header')
    @parent
    <h3 class="page-title">@lang('global.roles.title')</h3>
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Nome</th>
                            <td field-key='title'>{{ $role->name }}</td>
                        </tr>
                        <tr>
                            <th>Permissões</th>
                            <td field-key='permission'>
                                @foreach ($role->permissions as $permission)
                                    <span class="label label-info label-many">{{ $permission->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">

                <li role="presentation" class="active"><a href="#users" aria-controls="users" role="tab" data-toggle="tab">Usuários</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="users">
                    <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }}">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>@lang('global.roles.title')</th>
                            <th>@lang('global.app_action')</th>

                        </tr>
                        </thead>

                        <tbody>
                        @if (count($users) > 0)
                            @foreach ($users as $user)
                                <tr data-entry-id="{{ $user->id }}">
                                    <td field-key='name'>{{ $user->name }}</td>
                                    <td field-key='email'>{{ $user->email }}</td>
                                    <td field-key='role'>
                                        @foreach ($user->roles as $singleRole)
                                            <span class="label label-info label-many">{{ $singleRole->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @can('view')
                                            <a href="{{ route('admin.users.show',[$user->id]) }}" title="Visualizar" class="fa fa-search fa-lg"></a>
                                        @endcan
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10">@lang('global.app_no_entries_in_table')</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.roles.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

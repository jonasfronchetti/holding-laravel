@extends('sistema.template.formbusca')
@section('content_header')
    @parent
    <h3 class="page-title">Permissões</h3>
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
                            <td field-key='title'>{{ $permission->name }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">

                <li role="presentation" class="active"><a href="#roles" aria-controls="roles" role="tab" data-toggle="tab">Roles</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="roles">
                    <table class="table table-bordered table-striped {{ count($roles) > 0 ? 'datatable' : '' }}">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Permissões</th>
                            <th>&nbsp;</th>

                        </tr>
                        </thead>

                        <tbody>
                        @if (count($roles) > 0)
                            @foreach ($roles as $role)
                                <tr data-entry-id="{{ $role->id }}">
                                    <td field-key='title'>{{ $role->name }}</td>
                                    <td field-key='permission'>
                                        @foreach ($role->permissions as $singlePermission)
                                            <span class="label label-info label-many">{{ $singlePermission->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @can('role_view')
                                            <a href="{{ route('admin.roles.show',[$role->id]) }}" title="Visualizar" class="fa fa-search fa-lg"></a>
                                        @endcan
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7">@lang('global.app_no_entries_in_table')</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.permissions.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

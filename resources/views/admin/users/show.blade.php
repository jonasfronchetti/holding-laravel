@extends('sistema.template.formbusca')
@section('content_header')
    @parent
    <h3 class="page-title">@lang('global.users.title')</h3>
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
                            <th>@lang('global.users.fields.name')</th>
                            <td field-key='name'>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.email')</th>
                            <td field-key='email'>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.role')</th>
                            <td field-key='role'>
                                @foreach ($user->roles as $role)
                                    <span class="label label-info label-many">{{ $role->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">

                <li role="presentation" class="active"><a href="#empresas" aria-controls="empresas" role="tab" data-toggle="tab">Empresas</a></li>
                <li role="presentation" class=""><a href="#documents" aria-controls="documents" role="tab" data-toggle="tab">Documents</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="empresas">
                    <table class="table table-bordered table-striped {{ count($emitentes) > 0 ? 'datatable' : '' }}">
                        <thead>
                        <tr>
                            <th>@lang('global.empresas.fields.nome')</th>
                            <th>@lang('global.empresas.fields.fantasia')</th>
                            <th>@lang('global.empresas.fields.ifederal')</th>
                            <th>@lang('global.app_action')</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if (count($emitentes) > 0)
                            @foreach ($emitentes as $emitente)
                                <tr data-entry-id="{{ $emitente->id }}">
                                    <td field-key='property'>{{ $emitente->nome }}</td>
                                    <td field-key='user'>{{ $emitente->nomefantasia }}</td>
                                    <td field-key='note_text'>{!! $emitente->ifederal !!}</td>
                                    <td>
                                        @can('empresa_view')
                                            <a href="{{ route('admin.empresas.show',[$emitente->id]) }}" class="fa fa-search fa-lg" title="@lang('global.app_view')"></a>
                                        @endcan
                                        @can('empresa_edit')
                                            <a href="{{ route('admin.empresas.edit',[$emitente->id]) }}" class="fa fa-pencil-square-o fa-lg" title="@lang('global.app_edit')"></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">@lang('global.app_no_entries_in_table')</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane " id="documents">

                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.users.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

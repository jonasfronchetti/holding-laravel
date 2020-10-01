@extends('sistema.template.form')
@section('content_header')
    @parent
    <h1>
        @if(strpos($_SERVER["REQUEST_URI"], 'admin'))
            Administração
        @elseif(strpos($_SERVER["REQUEST_URI"], 'basico'))
            Basico
        @elseif(strpos($_SERVER["REQUEST_URI"], 'financeiro'))
            Financeiro
        @endif
        <small>@yield('nome_form')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">
                @if(strpos($_SERVER["REQUEST_URI"], 'admin'))
                    Administração
                @elseif(strpos($_SERVER["REQUEST_URI"], 'basico'))
                    Basico
                @elseif(strpos($_SERVER["REQUEST_URI"], 'financeiro'))
                    Financeiro
                @endif
            </a>
        </li>
        <li class="active">General</li>
    </ol>
@endsection

@section('content')
    <div class="btn-toolbar">
        <a href="@yield('url_inserir')" class="btn btn-app" title="Inserir novo registro">
            <i class="fa fa-plus"></i>  @lang('global.app_add_new')
        </a>
    </div>
@endsection
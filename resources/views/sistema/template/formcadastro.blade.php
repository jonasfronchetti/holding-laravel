@extends('sistema.template.form')
@section('content_header')
    @parent
    @include('sistema.template.mensagens')
@endsection

@section('after-styles-end')
    <link rel="stylesheet" href="{{ asset('css/cadastros.css') }}">
@stop

@section('after-scripts-end')
    <script src="{{ asset('js/cadastros.js') }}"></script>
@stop
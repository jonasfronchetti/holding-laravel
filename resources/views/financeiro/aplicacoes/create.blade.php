@extends('sistema.template.formcadastro')

@section('title', 'Aplicações')
@section('url_voltar', route('financeiro.aplicacoes.index'))

@section('content')
    @if (isset($data))
        {!! Form::model($data, ['route' => ['financeiro.aplicacoes.update', $data->id], 'class' => 'form-horizontal', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'financeiro.aplicacoes.store', 'class' => 'form-horizontal']) !!}
    @endif

    @include('sistema.template.botoescadastro')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Aplicação</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="btn btn-primary fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            @include('sistema.componentes.texto', ['id' => 'nome', 'label' => 'Nome'])
            @include('sistema.componentes.selecionaCurto', ['id' => 'tipo', 'label' => 'Tipo',
                                                            'values' => [//'1' => 'Crypto',
                                                                         //'2' => 'Forex',
                                                                         //'3' => 'Câmbio',
                                                                         //'4' => 'Pedras Preciosas',
                                                                         //'5' => 'Empresas',
                                                                         '1' => 'Definir tipos']
                                                            ])
            @include('sistema.componentes.numerico', ['id' => 'percrendimento', 'label' => 'Rendimento',
                                                      'attributes' => ['step' => '0.01']])
        </div>
    </div>
    {!! Form::close() !!}
@stop



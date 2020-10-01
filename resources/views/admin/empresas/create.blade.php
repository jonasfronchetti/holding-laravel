@extends('sistema.template.formcadastro')

@section('title', 'Empresa')
@section('url_voltar', route('admin.empresas.index'))

@section('content')
    @if (isset($data))
        {!! Form::model($data, ['route' => ['admin.empresas.update', $data->id], 'class' => 'form-horizontal', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'admin.empresas.store', 'class' => 'form-horizontal']) !!}
    @endif

    @include('sistema.template.botoescadastro')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Empresa</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="btn btn-primary fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            @include('sistema.componentes.texto', ['id' => 'nome', 'label' => 'Razão social'])
            @include('sistema.componentes.texto', ['id' => 'nomefantasia', 'label' => 'Nome Fantasia'])
            @include('sistema.componentes.textoCurto', ['id' => 'ifederal', 'label' => 'CNPJ', 'attributes' => ['class' => 'form-control js-cnpj', 'maxlength' => 18]])
            @include('sistema.componentes.textoCurto', ['id' => 'iestadual', 'label' => 'Insc. Estadual'])
            @include('sistema.componentes.textoCurto', ['id' => 'imunicipal', 'label' => 'Insc. Municipal'])
            @include('sistema.componentes.selecionaCurto', ['id' => 'codigoregimetributario', 'label' => 'Regime Tributário',
                                                            'values' => ['1' => 'Simples Nacional', '2' => 'Simples Nacional - Excesso de sublimite de receita bruta', '3' =>'Regime Normal']
                                                           ]
                    )
            @include('sistema.componentes.arquivo', ['id' => 'logo', 'label' => 'Logo'])
        </div>
    </div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Endereço e Contato</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="btn btn-primary fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            @include('sistema.componentes.textoCurto', ['id' => 'logadouro', 'label' => 'Endereço'])
            @include('sistema.componentes.textoCurto', ['id' => 'numero', 'label' => 'Número'])
            @include('sistema.componentes.textoCurto', ['id' => 'complemento', 'label' => 'Complemento'])
            @include('sistema.componentes.textoCurto', ['id' => 'bairro', 'label' => 'Bairro'])
            @include('sistema.componentes.textoCurto', ['id' => 'cep', 'label' => 'Cep'])
            @include('sistema.componentes.selecionaCidade', ['id' => 'cidade_id', 'label' => 'Cidade'])
            @include('sistema.componentes.textoCurto', ['id' => 'telefone', 'label' => 'Telefone'])
            @include('sistema.componentes.textoCurto', ['id' => 'celular', 'label' => 'Celular'])
            @include('sistema.componentes.email', ['id' => 'email', 'label' => 'E-mail'])
        </div>
    </div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Emissão</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="btn btn-primary fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            @include('sistema.componentes.selecionaCnae', ['id' => 'cnae_id', 'label' => 'Classificação Nacional de Atividades Econômicas'])
            @include('sistema.componentes.textoCurto', ['id' => 'hash', 'label' => 'Hash', 'attributes' => ['readonly' => 'true']])
        </div>
    </div>
    {!! Form::close() !!}
@stop



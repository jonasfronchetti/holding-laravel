@extends('sistema.template.formcadastro')

@section('title', 'Empresa')
@section('url_voltar', route('basico.pessoas.index'))

@section('content')
    @if (isset($data))
        {!! Form::model($data, ['route' => ['basico.pessoas.update', $pes->id], 'class' => 'form-horizontal', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'basico.pessoas.store', 'class' => 'form-horizontal']) !!}
    @endif

    @include('sistema.template.botoescadastro')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Pessoa</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="btn btn-primary fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            @include('sistema.componentes.texto', ['id' => 'nome', 'label' => 'Nome'])
            @include('sistema.componentes.textoCurto', ['id' => 'logadouro', 'label' => 'Endereço'])
            @include('sistema.componentes.textoCurto', ['id' => 'numero', 'label' => 'Número'])
            @include('sistema.componentes.textoCurto', ['id' => 'complemento', 'label' => 'Complemento'])
            @include('sistema.componentes.textoCurto', ['id' => 'bairro', 'label' => 'Bairro'])
            @include('sistema.componentes.textoCurto', ['id' => 'cep', 'label' => 'Cep'])
            @include('sistema.componentes.selecionaCidade', ['id' => 'cidade_id', 'label' => 'Cidade'])
            @include('sistema.componentes.textoCurto', ['id' => 'telefone', 'label' => 'Telefone'])
            @include('sistema.componentes.textoCurto', ['id' => 'celular', 'label' => 'Celular'])
            @include('sistema.componentes.email', ['id' => 'email', 'label' => 'E-mail'])
            @include('sistema.componentes.selecionaCurto', ['id' => 'tipopessoa', 'label' => 'Pessoa',
                                                            'values' => ['0' => 'Física', '1' => 'Jurídica']
                                                           ]
                    )
            @include('sistema.componentes.checkBox', ['id' => 'ativo', 'label' => 'Ativo'])

        </div>
    </div>

    <div class="box box-primary" id="pessoaFisica">
        <div class="box-header with-border">
            <h3 class="box-title">Pessoa Física</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="btn btn-primary fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            @include('sistema.componentes.textoCurto', ['id' => 'cpf', 'label' => 'CPF', 'attributes' => ['class' => 'form-control js-cpf', 'maxlength' => 14]])
            @include('sistema.componentes.textoCurto', ['id' => 'rg', 'label' => 'Identidade'])
        </div>
    </div>

    <div class="box box-primary" id="pessoaJuridica" style="display: none;">
        <div class="box-header with-border">
            <h3 class="box-title">Pessoa Jurídica</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="btn btn-primary fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            @include('sistema.componentes.texto', ['id' => 'nomefantasia', 'label' => 'Nome Fantasia'])
            @include('sistema.componentes.textoCurto', ['id' => 'ifederal', 'label' => 'CNPJ', 'attributes' => ['class' => 'form-control js-cnpj', 'maxlength' => 18]])
            @include('sistema.componentes.textoCurto', ['id' => 'iestadual', 'label' => 'Insc. Estadual'])
            @include('sistema.componentes.textoCurto', ['id' => 'imunicipal', 'label' => 'Insc. Municipal'])
        </div>
    </div>

    @if (! isset($data))
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Usuário</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="btn btn-primary fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                @include('sistema.componentes.senha', ['id' => 'password', 'label' => 'Senha'])
            </div>
        </div>
    @endif
    {!! Form::close() !!}
@stop

@section('after-scripts-end')
    @parent
    <script>

        $("#tipopessoa").on('change', function(){
            if ($(this).val() == 0) {
                document.getElementById("pessoaFisica").style.display = "";
                document.getElementById("pessoaJuridica").style.display = "none";
            } else {
                document.getElementById("pessoaFisica").style.display = "none";
                document.getElementById("pessoaJuridica").style.display = "";
            }
        });


    </script>
@endsection

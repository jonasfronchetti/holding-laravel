@extends('sistema.template.formcadastro')

@section('title', 'Produto')

@section('content')
    @if (isset($movimento))
        {!! Form::model($movimento, ['route' => ['financeiro', $movimento->id], 'class' => 'form-horizontal', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'estoque.movimentos.store', 'class' => 'form-horizontal']) !!}
    @endif


    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body">
                    <!--div class="row">
                        <div class="col-md-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Valor Total</span>
                                    <span class="info-box-number">R$ { {isset($movimento) ? $movimento['valortotal'] : '0,00'}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-blue"><i class="fa fa-clock-o"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Data:</span>
                                    <span class="info-box-number">20/12/2018</span>
                                </div>
                            </div>
                        </div>
                    </div-->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>

                                <div class="info-box-content">

                                    <div class="col-md-6">
                                        <span class="info-box-text">Valor Total</span>
                                        <span class="info-box-number">R$ {{isset($movimento) ? $movimento->valortotal : '0,00'}}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="info-box-text">Data:</span>
                                        <span class="info-box-number">{{ date('d/m/Y', strtotime(isset($movimento) ? $movimento->dhmovto : now()))}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @include('sistema.componentes.selecionaPessoa', ['id' => 'pessoa_id', 'label' => 'Cliente', 'attributes' => ['onchange' => 'trocarPessoa()']])
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                </div>
                                <div class="box-body no-padding">

                                    <div class="dataTables" style="overflow: auto; height: 410px; width: 100%;">

                                        <div id="produtos-selecionados">
                                            <div id="lista" class="table-responsive">
                                                <table cellpadding="0" cellspacing="0" class="table table-striped">
                                                    <tbody>
                                                    <tr>
                                                        <th width="10%"><h4 class="margin-top-0 margin-bottom-0">Qtd.</h4></th>
                                                        <th><h4 class="margin-top-0 margin-bottom-0">Produto</h4></th>
                                                        <th width="10%"><h4 class="margin-top-0 margin-bottom-0">Desc.</h4></th>
                                                        <th width="10%"><h4 class="margin-top-0 margin-bottom-0">Preço</h4></th>
                                                        <th width="10%"></th>
                                                    </tr>
                                                    @foreach($itens as $pd=>$item)
                                                    <tr class="produto-pedido">
                                                        <td>{{$item->quantidade}}</td>

                                                        <td>{{$item->produto->nome}}</td>
                                                        <td>{{$item->valordesconto}}</td>
                                                        <td>{{$item->valortotal}}</td>
                                                        <td class="text-center">
                                                            <a href="javascript:void(0);" onclick="carrinhoDeletarProduto({{$item->id}})" class="btn btn-xs btn-warning">
                                                                <i class="fa fa-trash-o fa-lg"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                    <h4>Total Do Pedido
                                        <div id="total-pedido" class="pull-right">R$ {{isset($movimento) ? $movimento->valortotal : '0,00'}}</div>
                                    </h4>

                                </div>
                                <div class="row">
                                    <div class="margin-top-10px-xs col-md-6">
                                        <button id="bntFinalizarVenda" type="submit" class="btn btn-success btn-lg" style="width:100%">Finalizar Venda</button>
                                    </div>
                                    <div class="margin-top-10px-xs col-md-6">
                                        <button id="bntCancelar" type="button" class="btn btn-danger btn-lg" onclick="carrinhoCancelarPDV({{ isset($movimento) ? $movimento->id : 0}});" style="width:100%">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}

        @if (isset($movimento))
            {!! Form::model($movimento, ['route' => ['estoque.movimentos.adicionaitempdv', $movimento->id], 'id' => 'form-adicionar-produto', 'class' => 'form-horizontal', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        @else
            {!! Form::open(['route' => ['financeiro', 0], 'id' => 'form-adicionar-produto', 'class' => 'form-horizontal', 'method' => 'POST']) !!}
        @endif

        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row">
                        @include('sistema.componentes.texto', ['id' => 'qrcode', 'label' => 'Comanda', 'attributes' => ['oninput' => 'abreLink(value)', 'autofocus']])
                    </div>
                    <div class="row" style="overflow: auto; height: 365px; width: 103%;">
                        @foreach($produtos as $produto)
                            <div class="col-md-3">
                                <div class="info-box">
                                    <a href="javascript:void(0);" onclick="carrinhoAdicionarProduto({{$produto->id}}, {{$produto->valorunitario}})">
                                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-pricetag-outline"></i></span>
                                    </a>
                                    <div class="info-box-content">
                                        <span class="info-box-text">{{$produto->nome}}</span>
                                        <span class="info-box-number">R$ {{$produto->valorunitario}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="row">
                        @include('sistema.componentes.selecionaAplicacao', ['id' => 'produto_id', 'label' => 'Produto', 'size' => 'Curto',
                        'attributes' => ['onchange' => 'preencherValor(value);', 'required' => 'true']])

                        @include('sistema.componentes.numerico',
                        ['id' => 'quantidade', 'label' => 'Quantidade', 'attributes' => ['step' => '0', 'onchange' => 'totalizar()', 'required' => 'true'] ])

                        @include('sistema.componentes.numerico',
                        ['id' => 'valorunitario', 'label' => 'Vlr Unitário', 'attributes' => ['step' => '0.01', 'onchange' => 'totalizar()', 'required' => 'true'] ])

                        @include('sistema.componentes.numerico',
                        ['id' => 'valordesconto', 'label' => 'Desconto', 'value' => '', 'attributes' => ['step' => '0.01', 'onchange' => 'totalizar()'] ])

                        @include('sistema.componentes.numerico',
                        ['id' => 'valortotal', 'label' => 'Valor Total', 'value' => '', 'attributes' => ['readonly' => 'true', 'step' => '0.01'] ])

                        <input type="hidden" id="pessoa_id_prod" name="pessoa_id_prod" value="{{ isset($movimento) ? $movimento->pessoa_id : ''}}">

                        <input type="hidden" id="dhmovto" name="dhmovto" value="{{ isset($movimento) ? $movimento->dhmovto : now()}}">

                        <div class="col-md-6">
                            <button type="submit" id="btnInserir" class="btn btn-primary btn-lg pull-right">Adicionar</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Formas De Pagamento</h3>
                                </div>
                                <a class="btn btn-app">
                                    <i class="fa fa-money"></i> Dinheiro
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {!! Form::close() !!}

    {!! Form::open(['route' => 'estoque.movimentos.deletaritempdv', 'class' => 'form-horizontal', 'method' => 'POST', 'id' => 'form-deletar-produto']) !!}
    <input type="hidden" id="movimentoproduto_id" name="movimentoproduto_id">
    {!! Form::close() !!}

    {!! Form::open(['route' => 'estoque.movimentos.cancelarpdv', 'class' => 'form-horizontal', 'method' => 'POST', 'id' => 'form-cancelar-pdv']) !!}
    <input type="hidden" id="movimento_id" name="movimento_id">
    {!! Form::close() !!}


@stop



@section('before-scripts-end')
    @parent
    <script>
        $('#produto_id')
            .on('select2:close', function (e) {
                $('#quantidade').focus();
            });

        function trocarPessoa() {
            document.getElementById("pessoa_id_prod").value = document.getElementById("pessoa_id").value;
        }

        function carrinhoAdicionarProduto(idproduto, vlrUnitario) {
            document.getElementById("produto_id").value = idproduto;
            var produtos = document.getElementById("produto_id");
            for (var i = 0; i < produtos.options.length; i++) {
                if (produtos.options[i].value == idproduto) {
                    produtos.options[i].selected = "true";
                    break;
                }
            }
            document.getElementById("quantidade").value = 1;
            document.getElementById("valorunitario").value = vlrUnitario;
            document.getElementById("valortotal").value = vlrUnitario;
            document.getElementById("valordesconto").value = 0;

            $('#form-adicionar-produto').submit();
        }
        function carrinhoDeletarProduto(movimentoproduto_id) {
            document.getElementById("movimentoproduto_id").value = movimentoproduto_id;
            $('#form-deletar-produto').submit();
        }

        function carrinhoCancelarPDV(movimento_id) {
            document.getElementById("movimento_id").value = movimento_id;
            $('#form-cancelar-pdv').submit();
        }

        function formataValores(valor) {
            return ( valor.toFixed(2).replace(/(\d)(?=(\d{3})+\,)/g, "$1."));
        }

        function totalizar() {
            quantidade = document.getElementById("quantidade").value;
            valorUnitario = document.getElementById("valorunitario").value;
            valorDesconto = document.getElementById("valordesconto").value;

            document.getElementById("valortotal").value = formataValores((valorUnitario - valorDesconto) * quantidade);

        }

        function preencherValor(produto_id) {
            valorUnitario = '0.00'; //ver uma forma de buscar o valor unitario do produto
            document.getElementById("quantidade").value = 1;
            document.getElementById("valorunitario").value = valorUnitario;
            document.getElementById("valordesconto").value = '0.00';
            totalizar();

            //$('#quantidade').focus();
            //document.getElementById('quantidade').focus();
        }

        function abreLink(link){
            if ((link.indexOf("/financeiro/emitente/") > 0) && (link.indexOf("/comanda/") > 0)) {
                window.open(link, '_self');
            } else {
                document.getElementById("qrcode").value = '';
            }
        }



    </script>
@endsection
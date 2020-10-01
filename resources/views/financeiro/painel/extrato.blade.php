@extends('sistema.template.formbusca')
@section('title', 'Painel do Cliente')

@section('content_header')
    <h1>
        Extrato
    </h1>
@stop

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lançamentos</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <div class="col-md-4">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>11/03/2019</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Deposito para #1</td>
                        <td class="pull-right"> 1.000,00 C</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Transf. Aplic. #1</td>
                        <td class="pull-right"> 1.000,00 D</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Saldo</td>
                        <td class="pull-right"> 0,00</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-4">
                <table class="table table-striped">
                    <tbody>
                    </tbody>
                </table>
            </div>

            <div class="col-md-4">
                <table class="table table-striped">
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>


    <div class="row">
        <div class="col-md-4">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Saldo</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    >
                </div>
                <div class="box-body" style="">
                    <h2 class="pull-right">0,00</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Bloqueado</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    >
                </div>
                <div class="box-body" style="">
                    <h2 class="pull-right">0,00</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Disponivel</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    >
                </div>
                <div class="box-body" style="">
                    <h2 class="pull-right">0,00</h2>
                </div>
            </div>
        </div>
    </div>
@stop

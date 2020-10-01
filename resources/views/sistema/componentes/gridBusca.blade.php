@include('sistema.componentes.modalDelete')


<div class="panel panel-default">
    <div class="panel-heading">
        Lista
    </div>

    <div class="panel-body table-responsive">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            <input id="pesquisa" type="text" class="form-control" placeholder="Pesquisar">
        </div>
        <table id="tabela" class="table table-bordered table-striped  table-hover datatable dt-select " role="grid" aria-describedby="example2_info" data-form="deleteForm">
            <thead>
            <tr role="row">
                <!--th style="text-align:center;"><input type="checkbox" id="select-all"></th-->
                @foreach($colunas as $cod=>$nome)
                    <th  class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">{{$nome}}</th>
                @endforeach
                @if( isset($actions) )
                    <th width="100px" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">
                        Ações
                    </th>
                @endif
            </tr>
            </thead>
        </table>
    </div>
</div>

<div class="row"></div>

@section('before-styles-end')
    <style>
        .dataTables_processing {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 40px;
            margin-left: -50%;
            margin-top: -25px;
            padding-top: 20px;
            text-align: center;
            font-size: 1.2em;
            background-color: white;
            background: -webkit-gradient(linear, left top, right top, color-stop(0%, rgba(255, 255, 255, 0)),
            color-stop(25%, rgba(255, 255, 255, 0.9)), color-stop(75%, rgba(255, 255, 255, 0.9)), color-stop(100%, rgba(255, 255, 255, 0)));
            background: -webkit-linear-gradient(left, rgba(255, 255, 255, 0) 0%, color-stop(100%, rgba(255, 255, 255, 0)));
        rgba(255, 255, 255, 0.9) 25 %, rgba(255, 255, 255, 0.9) 75 %, rgba(255, 255, 255, 0) 100 %);
            background: -moz-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
            background: -ms-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
            background: -o-linear-gradient(left, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%);
            background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.9) 25%, rgba(255, 255, 255, 0.9) 75%, rgba(255, 255, 255, 0) 100%)
        }
    </style>
@endsection

@section('before-scripts-end')
    <!-- DATA TABES SCRIPT -->
    <!--chama o modal para confirmar exclusão-->
    @parent
    <script>
        $('table[data-form="deleteForm"]').on('click', '.form-delete', function (e) {
            e.preventDefault();
            var $form = $(this);
            $('#confirm').modal({backdrop: 'static', keyboard: false})
                .on('click', '#delete-btn', function () {
                    //alert("Hello! I am an alert box!!");
                    $form.submit();
                });
        });
    </script>
    <script>
        $(function () {
            var table = $('#tabela').DataTable({
                sDom: '<"top">t<"clear">Brtlip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        text:      '<i class="fa fa-file-excel-o"> Excel</i>',
                        titleAttr: 'Excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend:    'csvHtml5',
                        text:      '<i class="fa fa-file-text-o"> CSV</i>',
                        titleAttr: 'CSV',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        download: 'open',
                        text:      '<i class="fa fa-file-pdf-o"> PDF</i>',
                        titleAttr: 'PDF',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }, 'colvis'],
                responsive: true,
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                processing: true,
                serverSide: true,
                stateSave: true,
                ajax: '{!! route($routeName) !!}',
                columns: [
                    //{ },
                        @foreach($colunas as $cod=>$nome)
                    {
                        data: '{!! $cod !!}', name: '{!! $cod !!}'
                    },
                        @endforeach
                        @if( isset($actions) ){
                        name: 'id',
                        data: 'action',
                        className: 'center',
                        orderable: 'false',
                    },
                    @endif
                ],
                language:
                    {
                        sEmptyTable: "Nenhum registro encontrado",
                        sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
                        sInfoFiltered: "(Filtrados de _MAX_ registros)",
                        sInfoPostFix: "",
                        sInfoThousands: ".",
                        sLengthMenu: "_MENU_ resultados por página",
                        sLoadingRecords: "Carregando...",
                        sProcessing: "Processando...",
                        sZeroRecords: "Nenhum registro encontrado",
                        sSearch: "Pesquisar ",
                        oPaginate: {
                            sNext: "Próximo",
                            sPrevious: "Anterior",
                            sFirst: "Primeiro",
                            sLast: "ÚLtimo"
                        },
                        oAria: {
                            sSortAscending: ": Ordenar colunas de forma ascendente",
                            sSortDescending: ": Ordenar colunas de forma descendente"
                        },
                        buttons: {
                            colvis: 'Selecionar colunas'
                        }
                    }
            });

            function filterGlobal() {
                $('#tabela').DataTable().search(
                    $('#pesquisa').val()
                ).draw();
            }

            $('#pesquisa').on('keyup', function () {
                filterGlobal();
            });
        });
    </script>
@endsection
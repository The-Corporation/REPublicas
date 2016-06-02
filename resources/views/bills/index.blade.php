@extends('layouts.master')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Contas
                    <button type="button" data-toggle="modal" data-target="#addBill"
                            class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> Adicionar conta
                    </button>
                </h1>
                <div class="clearfix"></div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        @if(Session::has('msg_success'))
            <div class="col-md-5 pull-right">
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Sucesso!</strong>
                    {{Session::get('msg_success')}}
                </div>
            </div>

        @elseif(Session::has('msg_fail'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Falha!</strong>
                {{Session::get('msg_fail')}}
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12" >
                <h3>
                </h3>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-striped table-hover" id="bills-table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th style="text-align: center; max-width: 100px;">Nome</th>
                        <th style="text-align: center; max-width: 100px;">Tipo</th>
                        <th style="text-align: center; max-width: 100px;">Valor</th>
                        <th style="text-align: center; max-width: 100px;">Vencimento</th>
                    </tr>
                    </thead>
                    <tbody style="text-align: center;"></tbody>
                    <tfoot>
                    <tr>
                        <th colspan="5" style="text-align:right;"></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        {{-- Modal para adicionar uma nova conta --}}
        <div id="addBill" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <strong>Adicionar Conta</strong>
                    </div>
                    <div class="modal-body">
                        {!! Form::model(new \Republicas\Models\Bill(), ['method' => 'POST',
                            'route' => ['bill_store', $republica->id]]) !!}
                        @include('bills.partials._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
@endsection

@section('inline_scripts')
    <script>
        $('#bills-table').dataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('bill_bills', $republica->id) !!}',
            columns: [
                {data: 'id', name: 'bills.id'},
                {data: 'billName', name: 'bills.name'},
                {data: 'name', name: 'billtypes.name'},
                {data: 'value', name: 'bills.value'},
                {data: 'due_date', name: 'bills.due_date'}
            ],
            "columnDefs": [
                {"visible": false, "targets": 0}
            ],
            "language": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar:",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            },
            "responsive": true,
            "footerCallback": function (tfoot, data, start, end, display) {
                var api = this.api();
                $( api.column( 3 ).footer() ).html( '<h4><span class="label label-danger">Total: R$ ' +
                        api.column( 3, { page: 'current'} ).data().reduce( function ( a, b ) {
                            return parseFloat(a) + parseFloat(b);
                        + '</span></h4>'}, 0 )
                );
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.maskMoney').maskMoney({
                thousands: '',
                decimal: '.',
                allowZero: true,
                prefix: 'R$ '
            });

            $('.dates').mask('00/00/0000', {
                placeholder: '__/__/____',
                clearIfNotMatch: true
            });
        });
    </script>
@endsection
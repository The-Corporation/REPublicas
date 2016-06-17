@extends('layouts.master')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> <i class="fa fa-dollar"></i> Gastos
                    <button type="button" data-toggle="modal" data-target="#addBill" {{ Auth::user()->can('manage_bills') || Auth::user()->can('create_bills') ? : 'disabled'}}
                            class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> Adicionar gasto
                    </button>
                </h1>
                <div class="clearfix"></div>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-12" >
            @foreach($bills as $key => $bill)
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-{{ ($bill->due_date->month == Carbon\Carbon::now()->month) ? 'green' : 'red' }}">
                    @if(Auth::user()->can('manage_bills') || Auth::user()->can('edit_bills'))
                    <a class="btnEditBill" href="#" data-bill="{{ $bill }}" data-date="{{ $bill->due_date->format('d/m/Y') }}">
                        <div class="panel-heading" data-toggle="tooltip" title="Clique para editar" data-placement="top">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="text-money" style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                        {{ $bill->billtype->name }}
                                    </div>
                                    <div class="value-money">R$ {{ $bill->value }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    Responsável: <strong>{{ $bill->responsible->name }}</strong>
                                </div class="col-xs-12">
                            </div>
                        </div>
                    </a>
                    @else
                    <div class="panel-heading" data-toggle="tooltip" title="Clique para editar" data-placement="top">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="text-money" style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                        {{ $bill->billtype->name }}
                                    </div>
                                    <div class="value-money">R$ {{ $bill->value }}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    Responsável: <strong>{{ $bill->responsible->name }}</strong>
                                </div class="col-xs-12">
                            </div>
                        </div>
                    @endif
                        <div class="panel-footer">
                            <span class="pull-left">Vencimento: {{ $bill->due_date->format('d/m/Y') }}</span>
                            @if(Auth::user()->can('manage_bills') || Auth::user()->can('pay_bills'))
                            <a id="pay-{{ $bill->id }}" href="#" class="do-payment" onclick="doPayment({{ $bill->id }})"><span class="pull-right"><i class="fa fa-dollar"></i> {{ ($bill->due_date->month == Carbon\Carbon::now()->month) ? 'Pagar' : 'Pgt Atrasado' }}</span></a>
                            @endif
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>

        {{-- Modal para adicionar uma nova gasto --}}
        <div id="addBill" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <strong>Adicionar gasto</strong>
                    </div>
                    <div class="modal-body">
                        <div id="newBill" class="newBill">
                            {!! Form::model(new \Republicas\Models\Bill(), ['method' => 'POST',
                                'route' => ['bill_store', $republica->id]]) !!}
                                @include('bills.partials._form')
                            {!! Form::close() !!}
                        </div>
                        <div id="newBillType" class="newBillType">
                            <h4 class="text-center">Adicionando novo tipo</h4>
                            {!! Form::open(['method' => 'POST', 'class' => 'form-horizontal', 'id' => 'formBillType']) !!}
                                @include('bills.partials._form-billtype')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal para editar uma gasto --}}
        <div id="editBill" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <strong>Editando gasto</strong>
                    </div>
                    <div class="modal-body">
                        <div id="newBill" class="newBill">
                            {!! Form::open(['method' => 'PUT', 'id' => 'formEditBill']) !!}
                                @include('bills.partials._form')
                            {!! Form::close() !!}
                        </div>
                        <div id="newBillType" class="newBillType">
                            <h4 class="text-center">Adicionando novo tipo</h4>
                            {!! Form::open(['method' => 'POST', 'class' => 'form-horizontal', 'id' => 'formBillType']) !!}
                                @include('bills.partials._form-billtype')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /#page-wrapper -->
@endsection

@section('inline_scripts')
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        $('.newBillType').hide();

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

    //***************************** Change between modals ************************************
    function showAddBillType() {
        $('.newBill').hide();
        $('.newBillType').show();
    };

    function showAddBill() {
        $('.newBill').show();
        $('.newBillType').hide();
    };
    //********************************************************************************************

    //********************************* Save Bill Function ****************************************
    $('#formBillType').submit(function(e) {
        e.preventDefault();
        var data = $(this).serializeArray();

        $.ajax({
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            method: 'POST',
            url: '{{ route('bill_addBillType', Auth::user()->republic->id) }}',
            data: {
                data: data,
            }
        })
        .done(function(data) {
            if(data.status == 'success') {
                $('#select-billtype').append('<option value="'+ data.billtype.id +'" selected>'+ data.billtype.name +'</option>');
                showAddBill();
            }
        });
    });
    //********************************************************************************************

    //********************************* Update Bill Function ***************************************
    $(document).on('click', '.btnEditBill', function() {
        var bill = $(this).data('bill');
        var billdate = $(this).data('date');
        var modal = $('#editBill');

        $('.modal-body').data('bill', bill.id);
        $('.modal-body').attr('data-bill', bill.id);
        $('.modal-body').data('rep-id', bill.republic_id);
        $('.modal-body').attr('data-rep-id', bill.republic_id);

        modal.find('select[name=billtype_id]').val(bill.billtype_id);
        modal.find('input[name=name]').val(bill.name);
        modal.find('input[name=value]').val(bill.value);
        modal.find('input[name=due_date]').val(billdate);
        modal.find('select[name=user_id]').val(bill.user_id);
        modal.modal();
    });

    $('#formEditBill').submit(function(e) {
        debugger
        e.preventDefault();
        var bill = $('.modal-body').data('bill');
        var rep_id = $('.modal-body').data('rep-id');
        var datas = $(this).serializeArray();

        $.ajax({
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            method: 'PUT',
            url: '/admin/republicas/'+ rep_id +'/contas/'+ bill +'/atualizar',
            data: {
                data: datas,
            }
        })
        .done(function(data) {
            if(data.status == 'success')
                location.reload();
        });
    });
    //***************************************************************************************

    //****************************** Do Payment Function ***********************************
    var doPayment = function(bill_id) {
        $.ajax({
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            method: 'PATCH',
            url: '/admin/republicas/pagar/'+bill_id,
        })
        .done(function(data) {
            if(data.status == 'success') {
                toastr.options = {
                    "preventDuplicates": true,
                    "timeOut": "2000",
                    "extendedTimeOut": "500",
                    "showMethod": "slideDown",
                    "hideMethod": "fadeOut",
                }
                toastr.success(data.bill + ' pago(a) com sucesso!', 'Sucesso');

                $('#pay-'+bill_id).parent().parent().parent().remove();
            }
        });
    };
    //***************************************************************************************
</script>
@endsection
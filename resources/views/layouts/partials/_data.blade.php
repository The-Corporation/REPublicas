<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-bed fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ $republica->number_rooms }}</div>
                        <div>Nº de Quartos</div>
                    </div>
                </div>
            </div>
            <a href="#" data-toggle="modal" data-target="#addMetaRep">
                <div class="panel-footer">
                    <span class="pull-left">Valor dos Quartos</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-{{ (count($republica->users) > 1) ? 'group' : 'child' }} fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ count($republica->users) }}</div>
                        <div>{{ (count($republica->users) > 1) ? 'Membros' : 'Membro' }}</div>
                    </div>
                </div>
            </div>
            @if(Auth::user()->can('manage_members') || Auth::user()->can('invite_members')  )
            <a href="{{ route('rep_invite') }}">
                <div class="panel-footer">
                    <span class="pull-left">Convidar!</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
            @else
            <div class="panel-footer">
                <span class="pull-left">Convidar!</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
            @endif
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-archive fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ $republica->getCurrentMonth() }}</div>
                        <div>R$ {{ number_format($republica->getBillTotal(), 2, '.', ',') }}</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Acessar Caixinha</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">&nbsp;</div>
                        <div>Listar Contas</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('bill_index', $republica->id) }}">
                <div class="panel-footer">
                    <span class="pull-left">Registrar gasto!</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /.row -->

{{-- Modal para adicionar meta dados para republica --}}
<div id="addMetaRep" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong>Valores dos quartos</strong>
            </div>
            <div class="modal-body">
                <div id="newMetaRep">
                    {!! Form::open(['method' => 'POST', 'id' => 'formAddMetaRep']) !!}
                        @include('republics.partials._form-meta')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@section('inline_scripts')
<script>
    $(document).ready(function() {
        $('.maskMoney').maskMoney({
            thousands: ',',
            decimal: '.',
            allowZero: true,
        });
    });

    //********************************* Save Meta Function ****************************************
    $('#formAddMetaRep').submit(function(e) {
        e.preventDefault();
        var data = $(this).serializeArray();

        $.ajax({
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            method: 'POST',
            url: '{{ route('rep_addMeta', $republica->id) }}',
            data: {
                data: data,
            },
            dataType: 'json'
        })
        .done(function(data) {
            if(data.status == 'success') {
                $('#addMetaRep').modal('hide');

                toastr.options = {
                    "preventDuplicates": true,
                    "timeOut": "2000",
                    "extendedTimeOut": "500",
                    "showMethod": "slideDown",
                    "hideMethod": "fadeOut",
                }
                toastr.success('Detalhes dos Quartos salvos.', 'Sucesso!');
            }
        });
    });
    //********************************************************************************************
</script>
@endsection
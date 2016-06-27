<div class="row">
    <div class="col-lg-3 col-xs-6">
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
            <a href="{{ route('room_index', $republica->id) }}">
                <div class="panel-footer">
                    <span class="pull-left">Detalhes do Quartos</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="panel panel-red">
            <a href="{{ route('rep_members', $republica->id) }}">
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
            </a>
            @if(Auth::user()->can('manage_members') || Auth::user()->can('invite_members')  )
            <a href="{{ route('rep_invite', Auth::user()->republic or Auth::user()->republics()->first()) }}">
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

    <div class="col-lg-3 col-xs-6">
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
            <a href="{{ route('report_general', $republica->id) }}">
                <div class="panel-footer">
                    <span class="pull-left">Acessar Caixinha</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
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
<!DOCTYPE html>
<html lang="pt_br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>REPúblicas</title>

    <link href="/../../../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"><!-- Bootstrap Core CSS -->
    <link href="/../../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet"><!-- MetisMenu CSS -->
    <link href="/../../../bower_components/startbootstrap-sb-admin-2/dist/css/sb-admin-2.css" rel="stylesheet"> <!-- Custom SB CSS -->
    <link href="/../../../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> <!-- Custom Fonts -->
    <link href="/../../../bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css"> <!-- Sweet Alert CSS-->
    <link href="/../../../css/custom.css" rel="stylesheet" type="text/css"> <!-- Custom CSS-->

    <!-- Jansy Bootstrap CDN -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CDN -->
    <link href="/../../../bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Toastr CDN -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <!-- Select2 CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <!-- HighSlide -->
    <link href="/../../../highslide/highslide.css" rel="stylesheet" />

    <!-- jQuery -->
    <script src="/../../../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<style>
    #noti_container {
        position: relative;
    }

    .noti_bubble {
        position: absolute;
        top: 0px;
        right: 0px;
        padding: auto;
        background-color: #9f191f;
        font-size: 0.7em;
        color: #fff;
        font-weight: bold;
        border-radius: 30px;
        box-shadow: 1px 1px 1px gray;
    }

    .avatar {
        margin-right: 1em;
        -webkit-box-shadow: 0 0 0 3px #fff, 0 0 0 4px #ddd, 0 0 0 0 rgba(0,0,0,.2);
        -moz-box-shadow: 0 0 0 3px #fff, 0 0 0 4px #ddd, 0 0 0 0 rgba(0,0,0,.2);
        box-shadow: 0 0 0 3px #fff, 0 0 0 4px #ddd, 0 0 0 0 rgba(0,0,0,.2);
    }
</style>

<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="" style="padding-top: 22px;"><strong class="text-success">REP</strong><small>úblicas</small></a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-tasks">
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 1</strong>
                                    <span class="pull-right text-muted">40% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 2</strong>
                                    <span class="pull-right text-muted">20% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        <span class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 3</strong>
                                    <span class="pull-right text-muted">60% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60% Complete (warning)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>Task 4</strong>
                                    <span class="pull-right text-muted">80% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Tasks</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul><!-- /.dropdown-tasks -->
            </li><!-- /.dropdown -->

            <!-- Notificações -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i id="noti_container" class="fa fa-bell fa-fw"></i>
                </a>
                @if(isset($notifications))
                    <div class="noti_bubble">{{ count($notifications) }}</div>
                @endif
                <ul class="dropdown-menu dropdown-alerts">
                    @if(isset($notifications))
                        @foreach($notifications as $notification)
                        <li>
                            <a href="{{ route('user_showInvite', $notification->id) }}">
                                <div>
                                    <i class="fa fa-user fa-fw"></i> Convite de Republica
                                    <span class="pull-right text-muted small">{{ $notification->created_at->diffForHumans() }}</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        @endforeach
                    @endif
                    <li>
                        <a class="text-center" href="#">
                            <strong>Ver todas</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul><!-- /.dropdown-alerts -->
            </li><!-- /.dropdown -->

            <!-- User Info -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <img src="{{ route('images', [Auth::user()->photo, 300]) }}"
                         class="img img-circle avatar" style=" width: 35px; height: 35px;">
                    <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{ route('user_edit', Auth::user()->id) }}"><i class="fa fa-user fa-fw"></i> Meu Perfil</a>
                    </li>
                    <li><a href="{{ route('user_destroy', Auth::user()->id) }}"><i class="fa fa-ban fa-fw"></i> Desativar Conta</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul><!-- /.dropdown-user -->
            </li><!-- /.dropdown -->
        </ul><!-- /.navbar-top-links -->

        @include('layouts.partials._leftmenu')
    </nav>

    @yield('content')

</div>

<!-- Bootstrap Core JavaScript -->
<script src="/../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="/../../../bower_components/metisMenu/dist/metisMenu.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="/../../../bower_components/startbootstrap-sb-admin-2/dist/js/sb-admin-2.js"></script>

<script src="/../../../bower_components/sweetalert/dist/sweetalert.min.js"></script>
<!-- Jansy Bootstrap CDN -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
<!-- Mask Money CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
<!-- Masks for Form Inputs -->
<script src="/../../../jquery-mask-plugin/dist/jquery.mask.min.js"></script>
<!-- DataTables-->
<script src="/../../../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<!-- SlimScroll -->
<script src="/../../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- Toastr CDN-->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- Select2 CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

@section('inline_scripts')
@show

<script type="text/javascript">
    $('.maskMoney').maskMoney({
        thousands: '',
        decimal: '.',
        allowZero: true,
    });
</script>

</body>
</html>

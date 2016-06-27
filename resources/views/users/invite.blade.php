@extends('layouts.master')

@section('content')
    <div id="page-wrapper">
        @if(isset($republica))
            <div class="row">
                <br>
                <div class="col-lg-12">
                    <!-- Data and Notifications Section -->
                    @include('layouts.partials._data')
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
                <div class="panel panel-green" style="margin-top: 5%;">
                    <div class="panel-heading">Convite para fazer parte de uma família!</div>
                    <div class="panel-body">
                        <p class="text-center" style="font-size: 1.3em;">{{ $notification->message }}</p>
                        <p class="text-center">Deseja aceitar o convite?</p>
                        <div class="text-center">
                            <a href="{{ route('notification_accept', $notification->id) }}" class="btn btn-success" style="color: #fff;"><i class="fa fa-check fa-2x fa-fw"></i></a>
                            <a href="{{ route('notification_deny', $notification->id) }}" class="btn btn-danger" style="color: #fff;"><i class="fa fa-remove fa-2x fa-fw"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /#page-wrapper -->
@endsection
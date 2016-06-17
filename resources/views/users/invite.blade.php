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
            <div class="col-lg-12 col-xs-12">
                <h1 class="page-header">Convite enviado por {{ $notification->republic->name }}</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div>{{ $notification->message }}</div>
                <div>
                    <a href="{{ route('notification_accept', $notification->id) }}" class="btn btn-success btn-xs"><i class="fa fa-check fa-fw"></i>Aceitar</a>
                    <a href="{{ route('notification_deny', $notification->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-remove fa-fw"></i> Recusar</a>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /#page-wrapper -->
@endsection
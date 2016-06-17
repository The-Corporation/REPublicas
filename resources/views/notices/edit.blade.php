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
            <div class="col-lg-12">
                <h1 class="page-header">Editando Aviso</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Formulário</strong>
                    </div>
                    <div class="panel-body">
                        {!! Form::model($notice, ['method' => 'PUT', 'route' => ['notice_update', $notice->republic->id, $notice->id]]) !!}
                            @include('notices.partials._form')
                        {!! Form::close() !!}
                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->
            </div><!-- /.col-lg-8 -->
        </div><!-- /.row -->
    </div><!-- /#page-wrapper -->
@endsection
@extends('layouts.master')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <br><br>
            <div class="col-lg-12">
                <!-- Data and Notifications Section -->
                @include('layouts.partials._data')
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> República
                    <i class="fa fa-angle-double-right"></i><small> Editando {{ $republica->name }}</small></h1>
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
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-file-text"></i> Formulário
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="col-md-9 col-md-offset-1">
                            {!! Form::model($republica, ['id' => 'rep_update', 'method' => 'PUT',
                            'route' => ['rep_update', $republica->id], 'class' => 'form-horizontal',
                            'files' => true]) !!}
                                @include('republics.partials._form')
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <!-- /.panel-body -->
                    <div class="panel-footer"></div>
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-8 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection
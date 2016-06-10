@extends('layouts.master')

@section('content')
    <div id="page-wrapper">
        @if(isset($republica))
        <div class="row">
            <br><br>
            <div class="col-lg-12">
                <!-- Data and Notifications Section -->
                @include('layouts.partials._data')
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><i class="fa fa-home"></i> República <i class="fa fa-angle-double-right"></i><small> Cadastrar</small></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-file-text"></i> Formulário
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="col-md-9 col-md-offset-1">
                            {!! Form::model(new \Republicas\Models\Republic, ['id' => 'rep_create',
                                'route' => 'rep_store', 'class' => 'form-horizontal', 'files' => true]) !!}
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
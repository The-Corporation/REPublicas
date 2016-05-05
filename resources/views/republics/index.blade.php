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
                <h1 class="page-header"><i class="fa fa-home"></i> {{ $republica->name }} </h1>
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
            <div class="col-lg-4">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        Dados Gerais
                    </div>
                    <div class="panel-body">
                        <address>
                            <strong>{{ $republica->name }}</strong>
                            <br>{{ $republica->address }}
                            <br>{{ $republica->city }}, {{ $republica->state }}
                            <br>
                            <abbr title="Telefone">Tel: </abbr>{{ $republica->telephone }}
                        </address>
                        <address>
                            <strong>{{ $republica->responsible->name }}</strong>
                            <br>
                            <em>{{ $republica->responsible->email }}</em>
                        </address>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-4 -->

            <div class="col-lg-8">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Descrição
                    </div>
                    <div class="panel-body">
                        {{ $republica->description }}
                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->
            </div><!-- /.col-lg-4 -->

        </div><!-- /.row -->
    </div><!-- /#page-wrapper -->
@endsection
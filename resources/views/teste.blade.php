@extends('layouts.master')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Repúblicas <i class="fa fa-angle-double-right"></i><small> Cadastrar</small></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- Data and Notifications Section -->
        @include('layouts.partials._data')

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-file-text"></i> Formulário
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="col-md-8 col-md-offset-2">
                            {!! Form::open() !!}
                                
                                <!-- Name Form Input -->
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-2 control-label">Nome<sup style="color: red;">*</sup></label>
                                        <div class="col-md-9">
                                            {!! Form::text('name', null, ['class' => 'form-control input-sm']) !!}
                                        </div>
                                    </div>
                                </div>

                                <!-- Vacancy Form Input -->
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-2 control-label">Vagas<sup style="color: red;">*</sup></label>
                                        <div class="col-md-9">
                                            {!! Form::text('vacancy', null, ['class' => 'form-control input-sm']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix">
                                    <div class="col-md-offset-4 col-md-8">
                                        <button class="btn btn-success" type="submit">
                                            <i class="fa fa-save"></i>
                                            Salvar
                                        </button>

                                        &nbsp; &nbsp; &nbsp;
                                        <a class="btn" href="{{Request::server('HTTP_REFERER')}}">
                                            <i class="fa fa-undo"></i>
                                            Voltar
                                        </a>
                                    </div>
                                </div>
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
    </div>
@endsection
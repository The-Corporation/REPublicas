@extends('layouts.master')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> <i class="fa fa-dollar"></i> Tipos de Gastos
                </h1>
                <div class="clearfix"></div>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-12" >
                <div class="col-lg-4 col-md-6">
                    <div id="newBillType" class="newBillType">
                            <h4 class="text-center">Editar tipo </h4>
                            {!! Form::model($type,['route' =>  ['type_update', $type->republic_id, $type->id],'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'formBillType']) !!}
                                @include('bills.partials._form-billtype')
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>





    </div><!-- /#page-wrapper -->
@endsection

@section('inline_scripts')
<script>
</script>
@endsection
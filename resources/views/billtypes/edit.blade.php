@extends('layouts.master')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header"> <i class="fa fa-dollar"></i> Editando tipo de gasto: {{ $billtype->name }}</h1>
            <div class="clearfix"></div>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->

    <div class="row">
        <div class="col-md-12" >
            <div id="editBillType">
                {!! Form::model($billtype, ['route' =>  ['billtype_update', $billtype->republic_id, $billtype->id],
                'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                    @include('bills.partials._form-billtype')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div><!-- /#page-wrapper -->
@endsection

@section('inline_scripts')
<script>
</script>
@endsection
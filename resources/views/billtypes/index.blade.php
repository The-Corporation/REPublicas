@extends('layouts.master')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                {{ $billtypes->first()->republic->name or 'República'}}
                <i class="fa fa-angle-double-right"></i> <small>Tipos de Gasto</small>
            </h1>
            <div class="clearfix"></div>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->

    <div class="row">
        <div class="col-md-12" >
            @foreach($billtypes as $key => $type)
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <a class="btnEditType" href="{{route('billtype_edit', [$type->republic_id, $type->id])}}"
                                  data-toggle="tooltip" title="Clique para editar" data-placement="top">
                                <span class="fa fa-pencil" style="color: white;"></span>
                            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a class="btnDeleteType" href="{{route('billtype_delete',[$type->republic_id, $type->id])}}"
                                  data-toggle="tooltip" title="Clique para excluir" data-placement="top">
                                <span class="fa fa-trash" style="color: white;"></span>
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-money fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right" style="padding-left: 20px;">
                                <div class="text-money" style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                    <strong>{{ $type->name }}</strong>
                                </div>
                                <div style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                    {{ $type->description }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div><!-- /#page-wrapper -->
@endsection

@section('inline_scripts')
<script>
$(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
});
</script>
@endsection
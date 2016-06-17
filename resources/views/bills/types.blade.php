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
                @foreach($billtypes as $key => $type)
                <div class="col-lg-4 col-md-6">
                <div class="panel panel-green">
                        <div class="panel-heading" data-toggle="tooltip" title="Clique para editar" data-placement="top">
                            <div class="pull-right">
                                <a class="btnEditType" href="{{route('type_edit',[$type->republic_id,$type->id])}}"><span class="fa fa-edit" style="color: white;"></span></a>
                                <a class="btnDeleteType" href="{{route('type_destroy',[$type->republic_id,$type->id])}}"><span class="fa fa-remove" style="color: white;"></span></a>
                            </div>
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="text-money" style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                        {{ $type->name }}
                                    </div>
                                    <div>{{ $type->description }}</div>
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
</script>
@endsection
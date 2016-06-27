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
            <h1 class="page-header">
                <span>{{ $republica->name }} <i class="fa fa-angle-double-right"></i> <small>Quartos</small></span>
            </h1>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->

    <div class="row">
        @foreach($republica->rooms as $room)
        <div class="col-lg-6 col-xs-6">
            <div class="panel panel-primary" data-toggle="tooltip" title="Editar" data-placement="left">
                <a href="{{ route('room_edit', [$republica->id, $room->id]) }}">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-bed fa-4x"></i>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-xs-9 text-right">
                                @foreach($room->users as $user)
                                <div class="huge pull-right">
                                    <img src="{{ route('images', [$user->photo, 50]) }}" style="margin-right: 5px;" class="img img-circle img-responsive"
                                              data-toggle="tooltip" title="{{ $user->name }}" data-placement="top">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </a>
                <div class="panel-footer">
                    <div class="col-md-5">
                        <span class="pull-left">Preço: R$ {{ $room->price }}</span>
                    </div>
                    <div class="col-md-3">
                        <span class="label label-danger">{{ $room->type }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="pull-right">Capacidade: {{ $room->num_beds }}</span>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        @endforeach
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
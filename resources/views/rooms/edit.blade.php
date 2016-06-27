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
                <span>{{ $republica->name }} <i class="fa fa-angle-double-right"></i> <small>Editando quarto</small></span>
            </h1>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::model($room, ['route' => ['room_update', $republica->id, $room->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                @include('rooms.partials._form')
            {!! Form::close() !!}
        </div>
    </div>
</div><!-- /#page-wrapper -->
@endsection

@section('inline_scripts')
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();

        $('.select2').select2({
            placeholder: 'Selecione os membros...',
            maximumSelectionLength: {{ $room->num_beds }},
            maximumSelected: function (args) {
                return 'Este quarto suporta até moradores.';
            },
        });
    });
</script>
@endsection
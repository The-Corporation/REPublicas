@extends('layouts.master')

@section('content')
<style type="text/css">
    .vertAlign {
        position: relative;
        top: 50%;
        transform: translateY(-50%);
    }
</style>
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
                <span>{{ $republica->name }}</span>
                <span>
                    <a class="btn btn-xs btn-success pull-right" href="#" data-toggle="modal" data-target="#addNotice"><i class="fa fa-plus"></i> Adicionar Aviso</a>
                </span>
            </h1>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->

    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <strong>Quadro de Avisos</strong>
                </div>
                <div id="noticesScroll" class="panel-body" style="padding: 0;">
                    @foreach($notices as $notice)

                        <div class="row well" style="margin-bottom: 2px;">
                            <div class="col-md-1" style="padding-left: 3px;">
                                <img src="{{ route('images', [$notice->author->photo, 60]) }}" class="img img-rounded pull-left"
                                          data-toggle="tooltip" title="{{ $notice->author->name }}" data-placement="right">
                            </div>

                            <div class="col-md-11">
                                <div class="col-md-12">
                                    <p class=" text-center" style="font-size: 1.2em;"><strong>{{ $notice->title }}</strong></p>
                                </div>

                                <div class="col-md-12 text-justify">
                                    {{ $notice->message }}
                                </div>

                                <div class="col-md-12">
                                        <a class="btnEditNotice pull-left"  href="{{ route('notice_edit', [$republica->id, $notice->id]) }}" data-notice-id="{{ $notice->id }}"><i class="fa fa-pencil"></i></a>
                                    <em class="pull-right">{{ $notice->created_at->diffForHumans() }}</em>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div><!-- /.panel-body -->
            </div><!-- /.panel -->
        </div><!-- /.col-lg-8 -->

        <div class="col-lg-4">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <strong>Dados Gerais</strong>
                    @if(Auth::user()->can('manage_republics') || Auth::user()->can('edit_republics'))
                    <div class="pull-right"><a href="{{ route('rep_edit', $republica->id) }}" style="color: #fff;"><i class="fa fa-pencil"></i></a></div>
                    @endif
                </div>
                <div class="panel-body">
                    <address>
                        <strong>{{ $republica->name }}</strong>
                        <br><br><i class="fa fa-road fa-fw"></i> {{ $republica->address }}
                        <br><i class="fa fa-map-marker fa-fw"></i> {{ $republica->city }}, {{ $republica->state }}
                        <br>
                        <i class="fa fa-phone fa-fw"></i> Tel: </abbr>{{ $republica->telephone }}
                    </address>
                    <address>
                        <i class="fa fa-mail-forward fa-fw"></i> <strong>{{ $republica->responsible->name }}</strong>
                        <br>
                        <em><i class="fa fa-envelope fa-fw"></i> {{ $republica->responsible->email }}</em>
                    </address>
                </div><!-- /.panel-body -->
            </div><!-- /.panel -->
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

    {{-- Modal para adicionar aviso --}}
    <div id="addNotice" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <strong>Adicionar aviso</strong>
                </div>
                <div class="modal-body">
                    {!! Form::model(new \Republicas\Models\Notice(), ['method' => 'POST',
                        'route' => ['notice_store', $republica->id]]) !!}
                        @include('notices.partials._form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div><!-- /#page-wrapper -->

<script src="/../../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();

    $('#noticesScroll').slimScroll({
        height: '210px',
        color: '#008800'
    });
});
</script>
@endsection

@section('inline_scripts')
<script>
</script>
@endsection
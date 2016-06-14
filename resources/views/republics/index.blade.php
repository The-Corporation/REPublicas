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
                    <div class="panel-body" style="overflow-y: scroll; max-height: 220px;">
                        @foreach($republica->notices as $notice)
                            <div class="col-md-1">
                                <a class="btnEditNotice"  href="{{ route('notice_edit', [$republica->id, $notice->id]) }}" data-notice-id="{{ $notice->id }}"><i class="fa fa-pencil"></i></a>
                            </div>
                            <div class="col-md-2">
                                <p>{{ $notice->title }}</p>
                            </div>
                            <div class="col-md-9">
                                {{ $notice->message }}
                            </div>
                            <div class="col-md-12">
                                <em class="pull-left">Postado por: {{ $notice->author->name }}</em>
                                <em class="pull-right">{{ $notice->created_at->diffForHumans() }}</em>
                                <hr>
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
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-4 -->

        </div><!-- /.row -->
    </div><!-- /#page-wrapper -->

    {{-- Modal para adicionar aviso --}}
    <div id="addNotice" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <strong>Adicionar aviso</strong>
                </div>
                <div class="modal-body">
                    <div>
                        {!! Form::model(new \Republicas\Models\Notice(), ['method' => 'POST',
                            'route' => ['notice_store', $republica->id]]) !!}
                            @include('notices.partials._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal para editar aviso --}}
    <div id="editNotice" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <strong>Editar aviso</strong>
                </div>
                <div class="modal-body">
                    <div>
                        {!! Form::open( ['method' => 'PUT']) !!}
                            @include('notices.partials._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('inline_scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btnEditNotice', function(e) {
                var modal = $('#editNotice');
                console.log('aaaaa');
            });
        });
    </script>
@endsection
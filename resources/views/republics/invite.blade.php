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
            <div class="col-lg-12 col-xs-12">
                <h1 class="page-header"> Convidar futuro morador
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 pull-right">
                        {!! Form::open(['route' => 'user_search', 'method' => 'GET', 'class' => 'form-horizontal']) !!}
                        <div class="input-group">
                            {!! Form::text('searchBox', null, ['class' => 'form-control',
                                           'placeholder' => 'Pesquisar usuário...']) !!}
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                @foreach($users as $user)
                    @unless($user->id == Auth::user()->id)
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <img src="{{ route('images', [$user->photo, 50]) }}" class="img img-responsive img-circle"
                                             style="margin: auto;">
                                    </div>
                                    <div class="col-xs-12 text-center">
                                        <div style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">{{ $user->name }}</div>
                                    </div>
                                </div>
                            </div>
                            <a href="">
                                <div class="panel-footer">
                                    <span class="pull-left">Convidar!</span>
                                    <span class="pull-right"><i style="color: red !important;" class="fa fa-plus-circle"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endunless
                @endforeach
            </div>
        </div><!-- /.row -->
    </div><!-- /#page-wrapper -->
@endsection
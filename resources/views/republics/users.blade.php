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
                <h1 class="page-header"> Usuários com email similar a: {{ $searchInput}}</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                @if($users->isEmpty())
                    <div class="alert alert-danger">Não há usuários com esse email!</div>
                @else
                    @foreach($users as $user)
                        @unless($user->id == Auth::user()->id || !$user->republics->isEmpty())
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
                                <a href="{{ route('rep_sendInvite', [Auth::user()->republic->id or Auth::user()->republics->first()->id, $user->id]) }}">
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
                @endif
            </div>
        </div><!-- /.row -->
    </div><!-- /#page-wrapper -->
@endsection
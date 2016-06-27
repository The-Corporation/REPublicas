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
                <h1 class="page-header"> Membros</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                @foreach($republica->users as $user)
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
                                <div class="panel-footer">
                                    @unless($user->id == Auth::user()->id)
                                        <span class="pull-left">Expulsar</span>
                                        <a href="{{ route('rep_removeMember', [$user->republics->first()->id, $user->id]) }}">
                                            <span class="pull-right"><i style="color: red !important;" class="fa fa-sign-out"></i></span>
                                            </a>
                                        <div class="clearfix"></div>
                                    @endunless
                                </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div><!-- /.row -->
    </div><!-- /#page-wrapper -->
@endsection
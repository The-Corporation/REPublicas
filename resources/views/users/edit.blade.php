@extends('layouts.master')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <h1 class="page-header"> {{ $user->name }}</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-file-text"></i> Meus dados
                    </div><!-- /.panel-heading -->
                    <div class="panel-body">
                        {!! Form::model($user, ['id' => 'user_update', 'method' => 'PUT',
                        'route' => ['user_update', $user->id], 'class' => 'form-horizontal',
                        'files' => true]) !!}
                        @include('users.partials._form')
                        {!! Form::close() !!}
                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->
            </div><!-- /.col-lg-8 -->

            @if($user->republic != null)
            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-xs-3 ">
                                <i class="fa fa-group fa-4x"></i>
                            </div>
                            <div class="col-lg-10 col-md-9 col-xs-9 text-right">
                                <div class="huge-text">{{ $user->republic->name }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <address>
                            <i class="fa fa-road fa-fw"></i> {{ $user->republic->address }}
                            <br><i class="fa fa-map-marker fa-fw"></i>{{ $user->republic->city }}, {{ $user->republic->state }}
                            <br><i class="fa fa-phone fa-fw"></i> Tel: {{ $user->republic->telephone }}
                        </address>
                        <address>
                            <i class="fa fa-mail-forward fa-fw"></i> <a href=""><strong>{{ $user->republic->responsible->name }}</strong></a>
                            <br>
                            <em><i class="fa fa-envelope fa-fw"></i> {{ $user->republic->responsible->email }}</em>
                        </address>
                    </div>
                    <a href="{{ route('rep_invite') }}">
                        <div class="panel-footer">

                        </div>
                    </a>
                </div>
            </div>
            @endif
        </div><!-- /.row -->
    </div><!-- /#page-wrapper -->

    {{-- Modal para alterar senha --}}
        <div id="editPassword" class="modal fade" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <strong>Alterar Senha</strong>
                    </div>
                    <div class="modal-body">
                        <div>
                            {!! Form::open(['method' => 'PATCH', 'id' => 'formEditPassword']) !!}
                                @include('users.partials._form-password')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('inline_scripts')
<script>
    //********************************* Update Password Function ****************************************
    $('#formEditPassword').submit(function(e) {
        e.preventDefault();
        var data = $(this).find('input[name=password]').val();

        $.ajax({
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            method: 'PATCH',
            url: '{{ route('user_updatePass', Auth::user()->id) }}',
            data: {
                data: data,
            },
            dataType: 'json'
        })
        .done(function(data) {
            if(data.status == 'success') {
                $('#editPassword').modal('hide');

                toastr.options = {
                    "preventDuplicates": true,
                    "timeOut": "2000",
                    "extendedTimeOut": "500",
                    "showMethod": "slideDown",
                    "hideMethod": "fadeOut",
                }
                toastr.success('Sua senha foi alterada!', 'Sucesso!');
            }
        });
    });
    //********************************************************************************************
</script>
@endsection
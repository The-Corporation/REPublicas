{!! Form::hidden('republic_id', $republica->id) !!}
{!! Form::hidden('user_id', Auth::user()->id) !!}
<!-- Title Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-md-2 control-label">Título</label>
        <div class="col-md-10">
            {!! Form::text('title', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>
</div>

<!-- Message Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-md-2 control-label">Mensagem</label>
        <div class="col-md-10">
            {!! Form::textarea('message', null, ['class' => 'form-control input-sm', 'rows' => '5', 'style' => 'resize: none;']) !!}
        </div>
    </div>
</div>

<div class="clearfix">
    <div class="col-md-offset-4 col-md-8">
        <button class="btn btn-success btn-sm" type="submit">
            <i class="fa fa-save"></i>
            Salvar
        </button>

        &nbsp; &nbsp; &nbsp;
        @if(strpos(Request::url(), 'alterar'))
            <a class="btn btn-danger btn-sm" href="{{ route('home', $notice->republic->id) }}">
                <i class="fa fa-undo"></i>
                Cancelar
            </a>
        @else
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                <i class="fa fa-undo"></i>
                Cancelar
            </button>
        @endif
    </div>
</div>
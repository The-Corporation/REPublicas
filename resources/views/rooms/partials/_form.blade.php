<div class="form-group">
    {!! Form::select('user_id[]', $users->lists('name', 'id'), $room->users->lists('name', 'id'), ['class' => 'form-control select2', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::number('num_beds', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::text('price', null, ['class' => 'form-control maskMoney']) !!}
</div>

<div class="clearfix">
    <div class="col-md-offset-3 col-md-6">
        <button class="btn btn-success btn-sm" type="submit">
            <i class="fa fa-save"></i>
            Salvar
        </button>

        &nbsp; &nbsp; &nbsp;
        <a href="{{ route('room_index', $republica->id) }}" class="btn btn-danger btn-sm">
            <i class="fa fa-undo"></i>
            Voltar
        </a>
    </div>
</div>
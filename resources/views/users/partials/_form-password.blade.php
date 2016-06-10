<!-- Password Form Input -->
<div class="form-group input-group">
    <span class="input-group-addon"><strong>Senha</strong></span>
    <div class="col-md-12 col-xs-12 input-group">
        {!! Form::password('password', ['class' => 'form-control input-sm text-right']) !!}
    </div>
</div>

<!-- Password Confirmation Form Input -->
<div class="form-group input-group">
    <span class="input-group-addon"><strong>Confirmar Senha</strong></span>
    <div class="col-md-12 col-xs-12 input-group">
        {!! Form::password('password_confirmation', ['class' => 'form-control input-sm text-right']) !!}
    </div>
</div>

<div class="clearfix">
    <div class="col-md-offset-2">
        <button class="btn btn-success btn-sm" type="submit">
            <i class="fa fa-save"></i>
            Salvar
        </button>

        &nbsp; &nbsp; &nbsp;
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
            <i class="fa fa-undo"></i>
            Cancelar
        </button>
    </div>
</div>
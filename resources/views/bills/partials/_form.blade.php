<!-- Name Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-md-4 control-label">Nome<sup style="color: red;">*</sup></label>
        <div class="col-md-8">
            {!! Form::text('name', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>
</div>

<!-- Value Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-md-4 control-label">Valor<sup style="color: red;">*</sup></label>
        <div class="col-md-8">
            {!! Form::text('value', null, ['class' => 'form-control input-sm maskMoney']) !!}
        </div>
    </div>
</div>

<!-- Due Date Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-md-4 control-label">Data de Vencimento<sup style="color: red;">*</sup></label>
        <div class="col-md-8">
            {!! Form::text('due_date', null, ['class' => 'form-control input-sm dates']) !!}
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
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
            <i class="fa fa-undo"></i>
            Cancelar
        </button>
    </div>
</div>
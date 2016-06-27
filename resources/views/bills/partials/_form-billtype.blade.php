<!-- Name Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-md-2 control-label">Nome<sup style="color: red;">*</sup></label>
        <div class="col-md-9">
            {!! Form::text('name', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>
</div>

<!-- Value Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-md-2 control-label">Descrição</label>
        <div class="col-md-9">
            {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5', 'style' => 'resize: none;']) !!}
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
        <button type="button" onclick="showAddBill()" class="btn btn-danger btn-sm">
            <i class="fa fa-undo"></i>
            Voltar
        </button>
    </div>
</div>
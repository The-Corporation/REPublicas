<!-- Price of Simple Room Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-md-4 control-label">Quarto Simples</label>
        <div class="col-md-5">
            {!! Form::text('simple_price', $republica->simple_price, ['class' => 'form-control maskMoney', 'id' => 'simple_price', 'disabled']) !!}
        </div>
        <div class="col-md-3">
            <a id="lockSimple" href="#" onclick="unlockSimple()"><i id="iconSimple" class="fa fa-lock fa-2x"></i></a>
        </div>
    </div>
</div>

<!-- Price of Suite Room Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-md-4 control-label">Suite</label>
        <div class="col-md-5">
            {!! Form::text('suite_price', $republica->suite_price, ['class' => 'form-control maskMoney', 'id' => 'suite_price', 'disabled']) !!}
        </div>
        <div class="col-md-3">
            <a id="lockSuite" href="#" onclick="unlockSuite()"><i id="iconSuite" class="fa fa-lock fa-2x"></i></a>
        </div>
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
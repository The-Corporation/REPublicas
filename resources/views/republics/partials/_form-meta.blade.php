<!-- Price of Simple Room Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-md-6">Quarto Simples</label>
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">R$</span>
                {!! Form::text('simple_price', $republica->simple_price, ['class' => 'form-control maskMoney', 'id' => 'simple_price', Auth::user()->can('manage_rooms') ? '' : 'disabled']) !!}
            </div>
        </div>
    </div>
</div>

<!-- Price of Suite Room Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-md-6">Suite</label>
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">R$</span>
                {!! Form::text('suite_price', $republica->suite_price, ['class' => 'form-control maskMoney', 'id' => 'suite_price', Auth::user()->can('manage_rooms') ? '' : 'disabled']) !!}
            </div>
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
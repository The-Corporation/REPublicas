<!-- Name Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-md-3 control-label">Nome<sup style="color: red;">*</sup></label>
        <div class="col-md-9">
            {!! Form::text('name', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>
</div>

<!-- Telefone Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-md-3 control-label">Telefone<sup style="color: red;">*</sup></label>
        <div class="col-md-9">
            {!! Form::text('telephone', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>
</div>

<!-- Number of Simple Rooms Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-md-3 control-label">Nº de Quartos Simples<sup style="color: red;">*</sup></label>
        <div class="col-md-9">
            {!! Form::number('simple_rooms', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>
</div>

<!-- Number of Suite Rooms Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-md-3 control-label">Nº de Suítes<sup style="color: red;">*</sup></label>
        <div class="col-md-9">
            {!! Form::number('suite_rooms', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>
</div>

<!-- Vacancy Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-md-3 control-label">Vagas<sup style="color: red;">*</sup></label>
        <div class="col-md-9">
            {!! Form::number('vacancy', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>
</div>

<!-- Address Details Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-md-3 control-label">Endereço</label>
        <div class="col-md-9">
            {!! Form::text('address', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>
</div>

<!-- City Details Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-md-3 control-label">Cidade</label>
        <div class="col-md-9">
            {!! Form::text('city', null, ['class' => 'form-control input-sm']) !!}
        </div>
    </div>
</div>

<!-- State Details Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-md-3 control-label">Estado</label>
        <div class="col-md-9">
            {!! Form::select('state', [0 => 'Selecione um Estado', 'SP' => 'São Paulo', 'MG' => 'Minas Gerais'], null,
                ['class' => 'form-control input-sm']) !!}
        </div>
    </div>
</div>

<!-- Description Form Input -->
<div class="form-group">
    <div class="row">
        <label class="col-md-3 control-label">Descrição</label>
        <div class="col-md-9">
            {!! Form::textarea('description', null, ['class' => 'form-control input-sm', 'rows' => 7, 'style' => 'resize:none;']) !!}
        </div>
    </div>
</div>

<div class="clearfix">
    <div class="col-md-offset-4 col-md-8">
        <button class="btn btn-success" type="submit">
            <i class="fa fa-save"></i>
            Salvar
        </button>

        &nbsp; &nbsp; &nbsp;
        <a class="btn" href="{{Request::server('HTTP_REFERER')}}">
            <i class="fa fa-undo"></i>
            Voltar
        </a>
    </div>
</div>
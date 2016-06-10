<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 15px;">
    <div class="col-md-12">
        <img src="{{ route('images', [$user->photo, 150]) }}" class="img img-rounded img-responsive pull-left"
         style="box-shadow: 2px 2px 5px #888888; margin-left: calc(30% - 20px); width: 140px; height: 140px;">
    </div>
    <div class="col-md-12">
        <a href="#" data-toggle="modal" data-target="#editPassword" class="btn btn-sm btn-success" style="margin-top: 10%; margin-left: calc(35% - 15px);">Alterar Senha</a>
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <div class="col-md-12 col-md-offset-3 col-xs-6 col-xs-offset-3">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 115px; height: 100px;">
                    <img data-src="holder.js/100%x100%" >
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail"
                     style="max-width: 200px; max-height: 150px;"></div>
                <div>
            <span class="btn btn-default btn-file btn-xs">
                <span class="fileinput-new">Selecionar imagem</span>
                <span class="fileinput-exists">Alterar</span>
                {!! Form::file('photo', null, ['class' => 'form-control']) !!}
            </span>
                    <a href="#" class="btn btn-danger btn-xs fileinput-exists" data-dismiss="fileinput">Remover</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Name Form Input -->
    <div class="form-group input-group">
        <span class="input-group-addon"><strong>Nome</strong></span>
        <div class="col-md-12 col-xs-12 input-group">
            {!! Form::text('name', null, ['class' => 'form-control input-sm text-right']) !!}
        </div>
    </div>

    <!-- Email Form Input
    <div class="form-group input-group">
        <span class="input-group-addon"><strong>Email</strong></span>
        <div class="col-md-12 col-xs-12 input-group">
            {{-- Form::text('email', null, ['class' => 'form-control input-sm text-right']) --}}
        </div>
    </div> -->
</div>

<div class="row">
    <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4">
        <button type="submit" class="btn btn-block btn-sm btn-primary"><i class="fa fa-save"></i> Salvar</button>
    </div>
</div>

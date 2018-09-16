<!-- Idanuncio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idanuncio', 'Idanuncio:') !!}
    {!! Form::number('idanuncio', null, ['class' => 'form-control']) !!}
</div>

<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefone', 'Telefone:') !!}
    {!! Form::text('telefone', null, ['class' => 'form-control']) !!}
</div>

<!-- Dtevento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dtevento', 'Dtevento:') !!}
    {!! Form::date('dtevento', null, ['class' => 'form-control']) !!}
</div>

<!-- Localizacao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('localizacao', 'Localizacao:') !!}
    {!! Form::text('localizacao', null, ['class' => 'form-control']) !!}
</div>

<!-- Dsevento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dsevento', 'Dsevento:') !!}
    {!! Form::text('dsevento', null, ['class' => 'form-control']) !!}
</div>

<!-- Dtinclusao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dtinclusao', 'Dtinclusao:') !!}
    {!! Form::date('dtinclusao', null, ['class' => 'form-control']) !!}
</div>

<!-- Ativo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ativo', 'Ativo:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('ativo', false) !!}
        {!! Form::checkbox('ativo', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orcamentoAvulsos.index') !!}" class="btn btn-default">Cancel</a>
</div>

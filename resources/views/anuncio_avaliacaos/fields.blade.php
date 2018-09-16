<!-- Idanuncio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idanuncio', 'Idanuncio:') !!}
    {!! Form::number('idanuncio', null, ['class' => 'form-control']) !!}
</div>

<!-- Nrestrelas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nrestrelas', 'Nrestrelas:') !!}
    {!! Form::number('nrestrelas', null, ['class' => 'form-control']) !!}
</div>

<!-- Observacao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observacao', 'Observacao:') !!}
    {!! Form::text('observacao', null, ['class' => 'form-control']) !!}
</div>

<!-- Idusuario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idusuario', 'Idusuario:') !!}
    {!! Form::number('idusuario', null, ['class' => 'form-control']) !!}
</div>

<!-- Dtinclusao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dtinclusao', 'Dtinclusao:') !!}
    {!! Form::date('dtinclusao', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('anuncioAvaliacaos.index') !!}" class="btn btn-default">Cancel</a>
</div>

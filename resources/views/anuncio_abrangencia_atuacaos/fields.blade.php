<!-- Idanuncio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idanuncio', 'Idanuncio:') !!}
    {!! Form::number('idanuncio', null, ['class' => 'form-control']) !!}
</div>

<!-- Abrangencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('abrangencia', 'Abrangencia:') !!}
    {!! Form::text('abrangencia', null, ['class' => 'form-control']) !!}
</div>

<!-- Idestado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idestado', 'Idestado:') !!}
    {!! Form::text('idestado', null, ['class' => 'form-control']) !!}
</div>

<!-- Idcidade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idcidade', 'Idcidade:') !!}
    {!! Form::number('idcidade', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('anuncioAbrangenciaAtuacaos.index') !!}" class="btn btn-default">Cancel</a>
</div>

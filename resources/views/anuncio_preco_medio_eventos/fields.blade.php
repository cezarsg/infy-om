<!-- Idanuncio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idanuncio', 'Idanuncio:') !!}
    {!! Form::number('idanuncio', null, ['class' => 'form-control']) !!}
</div>

<!-- Idtipoevento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idtipoevento', 'Idtipoevento:') !!}
    {!! Form::number('idtipoevento', null, ['class' => 'form-control']) !!}
</div>

<!-- Precomediocobrado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precoMedioCobrado', 'Precomediocobrado:') !!}
    {!! Form::number('precoMedioCobrado', null, ['class' => 'form-control']) !!}
</div>

<!-- Precomediocobradoportipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precoMedioCobradoPorTipo', 'Precomediocobradoportipo:') !!}
    {!! Form::text('precoMedioCobradoPorTipo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('anuncioPrecoMedioEventos.index') !!}" class="btn btn-default">Cancel</a>
</div>

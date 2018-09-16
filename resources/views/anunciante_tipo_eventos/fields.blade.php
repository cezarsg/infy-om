<!-- Idanunciante Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idanunciante', 'Idanunciante:') !!}
    {!! Form::number('idanunciante', null, ['class' => 'form-control']) !!}
</div>

<!-- Idtipoevento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idtipoevento', 'Idtipoevento:') !!}
    {!! Form::number('idtipoevento', null, ['class' => 'form-control']) !!}
</div>

<!-- Precomediocobrado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precomediocobrado', 'Precomediocobrado:') !!}
    {!! Form::number('precomediocobrado', null, ['class' => 'form-control']) !!}
</div>

<!-- Precomediocobradoportipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precomediocobradoportipo', 'Precomediocobradoportipo:') !!}
    {!! Form::text('precomediocobradoportipo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('anuncianteTipoEventos.index') !!}" class="btn btn-default">Cancel</a>
</div>

<!-- Idevento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idevento', 'Idevento:') !!}
    {!! Form::number('idevento', null, ['class' => 'form-control']) !!}
</div>

<!-- Fotodestaquecaminho Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fotodestaquecaminho', 'Fotodestaquecaminho:') !!}
    {!! Form::text('fotodestaquecaminho', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('paginaEventos.index') !!}" class="btn btn-default">Cancel</a>
</div>

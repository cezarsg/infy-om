<!-- Idevento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idevento', 'Idevento:') !!}
    {!! Form::number('idevento', null, ['class' => 'form-control']) !!}
</div>

<!-- Idcidade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idcidade', 'Idcidade:') !!}
    {!! Form::number('idcidade', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('eventoPublicoAlvos.index') !!}" class="btn btn-default">Cancel</a>
</div>

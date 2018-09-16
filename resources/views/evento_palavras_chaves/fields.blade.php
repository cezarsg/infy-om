<!-- Idevento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idevento', 'Idevento:') !!}
    {!! Form::number('idevento', null, ['class' => 'form-control']) !!}
</div>

<!-- Palavra Field -->
<div class="form-group col-sm-6">
    {!! Form::label('palavra', 'Palavra:') !!}
    {!! Form::text('palavra', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('eventoPalavrasChaves.index') !!}" class="btn btn-default">Cancel</a>
</div>

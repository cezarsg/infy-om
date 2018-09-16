<!-- Idconvidado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idconvidado', 'Idconvidado:') !!}
    {!! Form::number('idconvidado', null, ['class' => 'form-control']) !!}
</div>

<!-- Nmmesa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nmmesa', 'Nmmesa:') !!}
    {!! Form::text('nmmesa', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('eventoMesas.index') !!}" class="btn btn-default">Cancel</a>
</div>

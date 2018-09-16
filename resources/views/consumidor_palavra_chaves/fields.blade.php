<!-- Idconsumidor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idconsumidor', 'Idconsumidor:') !!}
    {!! Form::number('idconsumidor', null, ['class' => 'form-control']) !!}
</div>

<!-- Idpalavra Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idpalavra', 'Idpalavra:') !!}
    {!! Form::number('idpalavra', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('consumidorPalavraChaves.index') !!}" class="btn btn-default">Cancel</a>
</div>

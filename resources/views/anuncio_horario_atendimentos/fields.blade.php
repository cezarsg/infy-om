<!-- Idanuncio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idanuncio', 'Idanuncio:') !!}
    {!! Form::number('idanuncio', null, ['class' => 'form-control']) !!}
</div>

<!-- Diainicial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('diainicial', 'Diainicial:') !!}
    {!! Form::text('diainicial', null, ['class' => 'form-control']) !!}
</div>

<!-- Diafinal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('diafinal', 'Diafinal:') !!}
    {!! Form::text('diafinal', null, ['class' => 'form-control']) !!}
</div>

<!-- Horainicial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('horainicial', 'Horainicial:') !!}
    {!! Form::text('horainicial', null, ['class' => 'form-control']) !!}
</div>

<!-- Horafinal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('horafinal', 'Horafinal:') !!}
    {!! Form::text('horafinal', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('anuncioHorarioAtendimentos.index') !!}" class="btn btn-default">Cancel</a>
</div>

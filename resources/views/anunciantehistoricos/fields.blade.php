<!-- Idanunciante Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idanunciante', 'Idanunciante:') !!}
    {!! Form::number('idanunciante', null, ['class' => 'form-control']) !!}
</div>

<!-- Dtinclusao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dtinclusao', 'Dtinclusao:') !!}
    {!! Form::date('dtinclusao', null, ['class' => 'form-control']) !!}
</div>

<!-- Observacao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observacao', 'Observacao:') !!}
    {!! Form::text('observacao', null, ['class' => 'form-control']) !!}
</div>

<!-- Idstatus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idstatus', 'Idstatus:') !!}
    {!! Form::number('idstatus', null, ['class' => 'form-control']) !!}
</div>

<!-- Idusuario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idusuario', 'Idusuario:') !!}
    {!! Form::number('idusuario', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('anunciantehistoricos.index') !!}" class="btn btn-default">Cancel</a>
</div>

<!-- Idanunciante Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idanunciante', 'Idanunciante:') !!}
    {!! Form::number('idanunciante', null, ['class' => 'form-control']) !!}
</div>

<!-- Datainicial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('datainicial', 'Datainicial:') !!}
    {!! Form::date('datainicial', null, ['class' => 'form-control']) !!}
</div>

<!-- Datafinal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('datafinal', 'Datafinal:') !!}
    {!! Form::date('datafinal', null, ['class' => 'form-control']) !!}
</div>

<!-- Descricao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descricao', 'Descricao:') !!}
    {!! Form::text('descricao', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('anuncianteDiaPromocoes.index') !!}" class="btn btn-default">Cancel</a>
</div>

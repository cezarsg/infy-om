<!-- Idevento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idevento', 'Idevento:') !!}
    {!! Form::number('idevento', null, ['class' => 'form-control']) !!}
</div>

<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Apelido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apelido', 'Apelido:') !!}
    {!! Form::text('apelido', null, ['class' => 'form-control']) !!}
</div>

<!-- Confirmado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('confirmado', 'Confirmado:') !!}
    {!! Form::text('confirmado', null, ['class' => 'form-control']) !!}
</div>

<!-- Emailenviado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('emailenviado', 'Emailenviado:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('emailenviado', false) !!}
        {!! Form::checkbox('emailenviado', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('eventoConvidados.index') !!}" class="btn btn-default">Cancel</a>
</div>

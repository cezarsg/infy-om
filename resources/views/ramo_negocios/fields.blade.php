<!-- Descricao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descricao', 'Descricao:') !!}
    {!! Form::text('descricao', null, ['class' => 'form-control']) !!}
</div>

<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Ativo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ativo', 'Ativo:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('ativo', false) !!}
        {!! Form::checkbox('ativo', '1', null) !!} 1
    </label>
</div>

<!-- Exigenrconvidados Field -->
<div class="form-group col-sm-6">
    {!! Form::label('exigenrconvidados', 'Exigenrconvidados:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('exigenrconvidados', false) !!}
        {!! Form::checkbox('exigenrconvidados', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('ramoNegocios.index') !!}" class="btn btn-default">Cancel</a>
</div>

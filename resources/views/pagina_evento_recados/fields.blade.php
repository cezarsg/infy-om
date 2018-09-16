<!-- Idpagina Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idpagina', 'Idpagina:') !!}
    {!! Form::number('idpagina', null, ['class' => 'form-control']) !!}
</div>

<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Mensagem Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mensagem', 'Mensagem:') !!}
    {!! Form::text('mensagem', null, ['class' => 'form-control']) !!}
</div>

<!-- Dt. Inclusão Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Dt. Inclusão', 'Dt. Inclusão:') !!}
    {!! Form::date('Dt. Inclusão', null, ['class' => 'form-control']) !!}
</div>

<!-- Idaprovado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idaprovado', 'Idaprovado:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('idaprovado', false) !!}
        {!! Form::checkbox('idaprovado', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('paginaEventoRecados.index') !!}" class="btn btn-default">Cancel</a>
</div>

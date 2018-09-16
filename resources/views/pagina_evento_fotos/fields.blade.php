<!-- Idpagina Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idpagina', 'Idpagina:') !!}
    {!! Form::number('idpagina', null, ['class' => 'form-control']) !!}
</div>

<!-- Fotocaminho Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fotocaminho', 'Fotocaminho:') !!}
    {!! Form::text('fotocaminho', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('paginaEventoFotos.index') !!}" class="btn btn-default">Cancel</a>
</div>

<!-- Idpagina Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idpagina', 'Idpagina:') !!}
    {!! Form::number('idpagina', null, ['class' => 'form-control']) !!}
</div>

<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Conteudo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('conteudo', 'Conteudo:') !!}
    {!! Form::text('conteudo', null, ['class' => 'form-control']) !!}
</div>

<!-- Dt. Inclusão Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Dt. Inclusão', 'Dt. Inclusão:') !!}
    {!! Form::date('Dt. Inclusão', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('paginaEventoPosts.index') !!}" class="btn btn-default">Cancel</a>
</div>

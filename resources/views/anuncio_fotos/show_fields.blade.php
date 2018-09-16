<!-- Idanuncio Field -->
<div class="form-group">
    {!! Form::label('idanuncio', 'Idanuncio:') !!}
    <p>{!! $anuncioFotos->idanuncio !!}</p>
</div>

<!-- Fotocaminho Field -->
<div class="form-group">
    {!! Form::label('fotocaminho', 'Fotocaminho:') !!}
    <p>{!! $anuncioFotos->fotocaminho !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $anuncioFotos->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $anuncioFotos->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $anuncioFotos->deleted_at !!}</p>
</div>


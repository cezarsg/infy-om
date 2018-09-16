<!-- Quemconvida Field -->
<div class="form-group">
    {!! Form::label('quemconvida', 'Quemconvida:') !!}
    <p>{!! $eventoConvite->quemconvida !!}</p>
</div>

<!-- Titulo Field -->
<div class="form-group">
    {!! Form::label('titulo', 'Titulo:') !!}
    <p>{!! $eventoConvite->titulo !!}</p>
</div>

<!-- Mensagem Field -->
<div class="form-group">
    {!! Form::label('mensagem', 'Mensagem:') !!}
    <p>{!! $eventoConvite->mensagem !!}</p>
</div>

<!-- Fotocaminho Field -->
<div class="form-group">
    {!! Form::label('fotocaminho', 'Fotocaminho:') !!}
    <p>{!! $eventoConvite->fotocaminho !!}</p>
</div>

<!-- Idevento Field -->
<div class="form-group">
    {!! Form::label('idevento', 'Idevento:') !!}
    <p>{!! $eventoConvite->idevento !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $eventoConvite->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $eventoConvite->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $eventoConvite->deleted_at !!}</p>
</div>


<!-- Idevento Field -->
<div class="form-group">
    {!! Form::label('idevento', 'Idevento:') !!}
    <p>{!! $eventoServico->idevento !!}</p>
</div>

<!-- Idservico Field -->
<div class="form-group">
    {!! Form::label('idservico', 'Idservico:') !!}
    <p>{!! $eventoServico->idservico !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $eventoServico->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $eventoServico->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $eventoServico->deleted_at !!}</p>
</div>


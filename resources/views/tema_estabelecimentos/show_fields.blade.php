<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $temaEstabelecimento->id !!}</p>
</div>

<!-- Descricao Field -->
<div class="form-group">
    {!! Form::label('descricao', 'Descricao:') !!}
    <p>{!! $temaEstabelecimento->descricao !!}</p>
</div>

<!-- Ativo Field -->
<div class="form-group">
    {!! Form::label('ativo', 'Ativo:') !!}
    <p>{!! $temaEstabelecimento->ativo !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $temaEstabelecimento->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $temaEstabelecimento->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $temaEstabelecimento->deleted_at !!}</p>
</div>


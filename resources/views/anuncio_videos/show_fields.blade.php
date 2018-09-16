<!-- Idanuncio Field -->
<div class="form-group">
    {!! Form::label('idanuncio', 'Idanuncio:') !!}
    <p>{!! $anuncioVideos->idanuncio !!}</p>
</div>

<!-- Video Field -->
<div class="form-group">
    {!! Form::label('video', 'Video:') !!}
    <p>{!! $anuncioVideos->video !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $anuncioVideos->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $anuncioVideos->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $anuncioVideos->deleted_at !!}</p>
</div>


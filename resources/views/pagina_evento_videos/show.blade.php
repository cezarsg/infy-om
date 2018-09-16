@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pagina Evento Video
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('pagina_evento_videos.show_fields')
                    <a href="{!! route('paginaEventoVideos.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection

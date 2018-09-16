@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pagina Evento Video
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($paginaEventoVideo, ['route' => ['paginaEventoVideos.update', $paginaEventoVideo->id], 'method' => 'patch']) !!}

                        @include('pagina_evento_videos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
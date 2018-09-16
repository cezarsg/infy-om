@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Anuncio Videos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($anuncioVideos, ['route' => ['anuncioVideos.update', $anuncioVideos->id], 'method' => 'patch']) !!}

                        @include('anuncio_videos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
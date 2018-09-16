@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pagina Evento Post
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($paginaEventoPost, ['route' => ['paginaEventoPosts.update', $paginaEventoPost->id], 'method' => 'patch']) !!}

                        @include('pagina_evento_posts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
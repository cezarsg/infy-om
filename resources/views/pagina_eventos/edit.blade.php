@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pagina Evento
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($paginaEvento, ['route' => ['paginaEventos.update', $paginaEvento->id], 'method' => 'patch']) !!}

                        @include('pagina_eventos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
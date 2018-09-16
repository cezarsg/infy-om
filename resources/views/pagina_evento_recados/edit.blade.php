@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pagina Evento Recado
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($paginaEventoRecado, ['route' => ['paginaEventoRecados.update', $paginaEventoRecado->id], 'method' => 'patch']) !!}

                        @include('pagina_evento_recados.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
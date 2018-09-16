@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Status Evento
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($statusEvento, ['route' => ['statusEventos.update', $statusEvento->id], 'method' => 'patch']) !!}

                        @include('status_eventos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
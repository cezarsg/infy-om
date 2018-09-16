@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Grau Evento
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($grauEvento, ['route' => ['grauEventos.update', $grauEvento->id], 'method' => 'patch']) !!}

                        @include('grau_eventos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
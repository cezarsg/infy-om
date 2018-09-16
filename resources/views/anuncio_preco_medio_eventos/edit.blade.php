@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Anuncio Preco Medio Evento
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($anuncioPrecoMedioEvento, ['route' => ['anuncioPrecoMedioEventos.update', $anuncioPrecoMedioEvento->id], 'method' => 'patch']) !!}

                        @include('anuncio_preco_medio_eventos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
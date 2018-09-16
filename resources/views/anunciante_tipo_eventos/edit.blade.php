@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Anunciante Tipo Evento
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($anuncianteTipoEvento, ['route' => ['anuncianteTipoEventos.update', $anuncianteTipoEvento->id], 'method' => 'patch']) !!}

                        @include('anunciante_tipo_eventos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Anuncio Horario Atendimento
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($anuncioHorarioAtendimento, ['route' => ['anuncioHorarioAtendimentos.update', $anuncioHorarioAtendimento->id], 'method' => 'patch']) !!}

                        @include('anuncio_horario_atendimentos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
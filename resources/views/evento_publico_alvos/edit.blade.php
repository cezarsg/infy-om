@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Evento Publico Alvo
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($eventoPublicoAlvo, ['route' => ['eventoPublicoAlvos.update', $eventoPublicoAlvo->id], 'method' => 'patch']) !!}

                        @include('evento_publico_alvos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
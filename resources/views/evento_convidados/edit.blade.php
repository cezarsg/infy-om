@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Evento Convidados
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($eventoConvidados, ['route' => ['eventoConvidados.update', $eventoConvidados->id], 'method' => 'patch']) !!}

                        @include('evento_convidados.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
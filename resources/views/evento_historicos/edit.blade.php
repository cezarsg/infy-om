@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Evento Historico
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($eventoHistorico, ['route' => ['eventoHistoricos.update', $eventoHistorico->id], 'method' => 'patch']) !!}

                        @include('evento_historicos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
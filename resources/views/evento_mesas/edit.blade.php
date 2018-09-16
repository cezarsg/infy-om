@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Evento Mesas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($eventoMesas, ['route' => ['eventoMesas.update', $eventoMesas->id], 'method' => 'patch']) !!}

                        @include('evento_mesas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
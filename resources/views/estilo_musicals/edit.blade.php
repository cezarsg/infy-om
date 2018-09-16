@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Estilo Musical
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($estiloMusical, ['route' => ['estiloMusicals.update', $estiloMusical->id], 'method' => 'patch']) !!}

                        @include('estilo_musicals.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
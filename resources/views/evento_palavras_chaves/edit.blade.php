@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Evento Palavras Chave
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($eventoPalavrasChave, ['route' => ['eventoPalavrasChaves.update', $eventoPalavrasChave->id], 'method' => 'patch']) !!}

                        @include('evento_palavras_chaves.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
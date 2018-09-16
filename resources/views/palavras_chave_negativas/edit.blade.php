@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Palavras Chave Negativas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($palavrasChaveNegativas, ['route' => ['palavrasChaveNegativas.update', $palavrasChaveNegativas->id], 'method' => 'patch']) !!}

                        @include('palavras_chave_negativas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
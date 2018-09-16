@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Anunciantehistorico
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($anunciantehistorico, ['route' => ['anunciantehistoricos.update', $anunciantehistorico->id], 'method' => 'patch']) !!}

                        @include('anunciantehistoricos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
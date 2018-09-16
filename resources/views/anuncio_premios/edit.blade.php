@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Anuncio Premios
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($anuncioPremios, ['route' => ['anuncioPremios.update', $anuncioPremios->id], 'method' => 'patch']) !!}

                        @include('anuncio_premios.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
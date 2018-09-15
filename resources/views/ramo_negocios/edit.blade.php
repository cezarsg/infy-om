@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ramo Negocio
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($ramoNegocio, ['route' => ['ramoNegocios.update', $ramoNegocio->id], 'method' => 'patch']) !!}

                        @include('ramo_negocios.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
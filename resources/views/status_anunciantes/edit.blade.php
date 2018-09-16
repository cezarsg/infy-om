@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Status Anunciante
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($statusAnunciante, ['route' => ['statusAnunciantes.update', $statusAnunciante->id], 'method' => 'patch']) !!}

                        @include('status_anunciantes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
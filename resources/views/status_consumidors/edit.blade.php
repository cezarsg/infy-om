@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Status Consumidor
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($statusConsumidor, ['route' => ['statusConsumidors.update', $statusConsumidor->id], 'method' => 'patch']) !!}

                        @include('status_consumidors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
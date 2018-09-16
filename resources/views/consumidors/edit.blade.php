@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Consumidor
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($consumidor, ['route' => ['consumidors.update', $consumidor->id], 'method' => 'patch']) !!}

                        @include('consumidors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
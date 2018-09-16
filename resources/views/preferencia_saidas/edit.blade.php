@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Preferencia Saida
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($preferenciaSaida, ['route' => ['preferenciaSaidas.update', $preferenciaSaida->id], 'method' => 'patch']) !!}

                        @include('preferencia_saidas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
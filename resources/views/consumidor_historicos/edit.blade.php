@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Consumidor Historico
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($consumidorHistorico, ['route' => ['consumidorHistoricos.update', $consumidorHistorico->id], 'method' => 'patch']) !!}

                        @include('consumidor_historicos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
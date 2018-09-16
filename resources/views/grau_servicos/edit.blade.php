@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Grau Servico
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($grauServico, ['route' => ['grauServicos.update', $grauServico->id], 'method' => 'patch']) !!}

                        @include('grau_servicos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
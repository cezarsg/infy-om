@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Opcao Culinaria
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($opcaoCulinaria, ['route' => ['opcaoCulinarias.update', $opcaoCulinaria->id], 'method' => 'patch']) !!}

                        @include('opcao_culinarias.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
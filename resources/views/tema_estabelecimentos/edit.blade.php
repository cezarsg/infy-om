@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tema Estabelecimento
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($temaEstabelecimento, ['route' => ['temaEstabelecimentos.update', $temaEstabelecimento->id], 'method' => 'patch']) !!}

                        @include('tema_estabelecimentos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
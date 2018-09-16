@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Status Orcamento
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($statusOrcamento, ['route' => ['statusOrcamentos.update', $statusOrcamento->id], 'method' => 'patch']) !!}

                        @include('status_orcamentos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Orcamento Item
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($orcamentoItem, ['route' => ['orcamentoItems.update', $orcamentoItem->id], 'method' => 'patch']) !!}

                        @include('orcamento_items.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
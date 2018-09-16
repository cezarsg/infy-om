@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Orcamento Mensagens
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($orcamentoMensagens, ['route' => ['orcamentoMensagens.update', $orcamentoMensagens->id], 'method' => 'patch']) !!}

                        @include('orcamento_mensagens.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
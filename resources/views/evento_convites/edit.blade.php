@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Evento Convite
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($eventoConvite, ['route' => ['eventoConvites.update', $eventoConvite->id], 'method' => 'patch']) !!}

                        @include('evento_convites.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
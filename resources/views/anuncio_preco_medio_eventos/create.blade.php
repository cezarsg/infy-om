@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Anuncio Preco Medio Evento
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'anuncioPrecoMedioEventos.store']) !!}

                        @include('anuncio_preco_medio_eventos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

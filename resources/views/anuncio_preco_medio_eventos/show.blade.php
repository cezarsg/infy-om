@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Anuncio Preco Medio Evento
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('anuncio_preco_medio_eventos.show_fields')
                    <a href="{!! route('anuncioPrecoMedioEventos.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Anuncio Premios
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('anuncio_premios.show_fields')
                    <a href="{!! route('anuncioPremios.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection

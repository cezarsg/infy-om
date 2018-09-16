@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Consumidor Palavra Chave
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'consumidorPalavraChaves.store']) !!}

                        @include('consumidor_palavra_chaves.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Consumidor Opcao Culinaria
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'consumidorOpcaoCulinarias.store']) !!}

                        @include('consumidor_opcao_culinarias.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

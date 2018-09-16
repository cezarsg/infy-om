@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Anunciante
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('anunciantes.show_fields')
                    <a href="{!! route('anunciantes.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection

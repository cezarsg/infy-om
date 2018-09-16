<table class="table table-responsive" id="anuncioPrecoMedioEventos-table">
    <thead>
        <tr>
            <th>Idanuncio</th>
        <th>Idtipoevento</th>
        <th>Precomediocobrado</th>
        <th>Precomediocobradoportipo</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($anuncioPrecoMedioEventos as $anuncioPrecoMedioEvento)
        <tr>
            <td>{!! $anuncioPrecoMedioEvento->idanuncio !!}</td>
            <td>{!! $anuncioPrecoMedioEvento->idtipoevento !!}</td>
            <td>{!! $anuncioPrecoMedioEvento->precoMedioCobrado !!}</td>
            <td>{!! $anuncioPrecoMedioEvento->precoMedioCobradoPorTipo !!}</td>
            <td>
                {!! Form::open(['route' => ['anuncioPrecoMedioEventos.destroy', $anuncioPrecoMedioEvento->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('anuncioPrecoMedioEventos.show', [$anuncioPrecoMedioEvento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('anuncioPrecoMedioEventos.edit', [$anuncioPrecoMedioEvento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
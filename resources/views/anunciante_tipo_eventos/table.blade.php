<table class="table table-responsive" id="anuncianteTipoEventos-table">
    <thead>
        <tr>
            <th>Idanunciante</th>
        <th>Idtipoevento</th>
        <th>Precomediocobrado</th>
        <th>Precomediocobradoportipo</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($anuncianteTipoEventos as $anuncianteTipoEvento)
        <tr>
            <td>{!! $anuncianteTipoEvento->idanunciante !!}</td>
            <td>{!! $anuncianteTipoEvento->idtipoevento !!}</td>
            <td>{!! $anuncianteTipoEvento->precomediocobrado !!}</td>
            <td>{!! $anuncianteTipoEvento->precomediocobradoportipo !!}</td>
            <td>
                {!! Form::open(['route' => ['anuncianteTipoEventos.destroy', $anuncianteTipoEvento->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('anuncianteTipoEventos.show', [$anuncianteTipoEvento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('anuncianteTipoEventos.edit', [$anuncianteTipoEvento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
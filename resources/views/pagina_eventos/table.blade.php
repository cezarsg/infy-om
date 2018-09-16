<table class="table table-responsive" id="paginaEventos-table">
    <thead>
        <tr>
            <th>Idevento</th>
        <th>Fotodestaquecaminho</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($paginaEventos as $paginaEvento)
        <tr>
            <td>{!! $paginaEvento->idevento !!}</td>
            <td>{!! $paginaEvento->fotodestaquecaminho !!}</td>
            <td>
                {!! Form::open(['route' => ['paginaEventos.destroy', $paginaEvento->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('paginaEventos.show', [$paginaEvento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('paginaEventos.edit', [$paginaEvento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
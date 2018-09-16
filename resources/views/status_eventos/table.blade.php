<table class="table table-responsive" id="statusEventos-table">
    <thead>
        <tr>
            <th>Descricao</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($statusEventos as $statusEvento)
        <tr>
            <td>{!! $statusEvento->descricao !!}</td>
            <td>
                {!! Form::open(['route' => ['statusEventos.destroy', $statusEvento->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('statusEventos.show', [$statusEvento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('statusEventos.edit', [$statusEvento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
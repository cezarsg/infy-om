<table class="table table-responsive" id="grauEventos-table">
    <thead>
        <tr>
            <th>Descricao</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($grauEventos as $grauEvento)
        <tr>
            <td>{!! $grauEvento->descricao !!}</td>
            <td>
                {!! Form::open(['route' => ['grauEventos.destroy', $grauEvento->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('grauEventos.show', [$grauEvento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('grauEventos.edit', [$grauEvento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
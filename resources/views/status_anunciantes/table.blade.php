<table class="table table-responsive" id="statusAnunciantes-table">
    <thead>
        <tr>
            <th>Descricao</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($statusAnunciantes as $statusAnunciante)
        <tr>
            <td>{!! $statusAnunciante->descricao !!}</td>
            <td>
                {!! Form::open(['route' => ['statusAnunciantes.destroy', $statusAnunciante->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('statusAnunciantes.show', [$statusAnunciante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('statusAnunciantes.edit', [$statusAnunciante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
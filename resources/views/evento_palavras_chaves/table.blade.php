<table class="table table-responsive" id="eventoPalavrasChaves-table">
    <thead>
        <tr>
            <th>Idevento</th>
        <th>Palavra</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($eventoPalavrasChaves as $eventoPalavrasChave)
        <tr>
            <td>{!! $eventoPalavrasChave->idevento !!}</td>
            <td>{!! $eventoPalavrasChave->palavra !!}</td>
            <td>
                {!! Form::open(['route' => ['eventoPalavrasChaves.destroy', $eventoPalavrasChave->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('eventoPalavrasChaves.show', [$eventoPalavrasChave->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('eventoPalavrasChaves.edit', [$eventoPalavrasChave->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
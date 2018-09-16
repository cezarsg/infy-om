<table class="table table-responsive" id="eventoServicos-table">
    <thead>
        <tr>
            <th>Idevento</th>
        <th>Idservico</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($eventoServicos as $eventoServico)
        <tr>
            <td>{!! $eventoServico->idevento !!}</td>
            <td>{!! $eventoServico->idservico !!}</td>
            <td>
                {!! Form::open(['route' => ['eventoServicos.destroy', $eventoServico->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('eventoServicos.show', [$eventoServico->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('eventoServicos.edit', [$eventoServico->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<table class="table table-responsive" id="eventoPublicoAlvos-table">
    <thead>
        <tr>
            <th>Idevento</th>
        <th>Idcidade</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($eventoPublicoAlvos as $eventoPublicoAlvo)
        <tr>
            <td>{!! $eventoPublicoAlvo->idevento !!}</td>
            <td>{!! $eventoPublicoAlvo->idcidade !!}</td>
            <td>
                {!! Form::open(['route' => ['eventoPublicoAlvos.destroy', $eventoPublicoAlvo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('eventoPublicoAlvos.show', [$eventoPublicoAlvo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('eventoPublicoAlvos.edit', [$eventoPublicoAlvo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
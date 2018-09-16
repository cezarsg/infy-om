<table class="table table-responsive" id="eventoMesas-table">
    <thead>
        <tr>
            <th>Idconvidado</th>
        <th>Nmmesa</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($eventoMesas as $eventoMesas)
        <tr>
            <td>{!! $eventoMesas->idconvidado !!}</td>
            <td>{!! $eventoMesas->nmmesa !!}</td>
            <td>
                {!! Form::open(['route' => ['eventoMesas.destroy', $eventoMesas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('eventoMesas.show', [$eventoMesas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('eventoMesas.edit', [$eventoMesas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
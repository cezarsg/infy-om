<table class="table table-responsive" id="cidades-table">
    <thead>
        <tr>
            <th>Nome</th>
        <th>Idestado</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cidades as $cidade)
        <tr>
            <td>{!! $cidade->nome !!}</td>
            <td>{!! $cidade->idestado !!}</td>
            <td>
                {!! Form::open(['route' => ['cidades.destroy', $cidade->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('cidades.show', [$cidade->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('cidades.edit', [$cidade->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
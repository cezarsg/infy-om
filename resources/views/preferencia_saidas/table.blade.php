<table class="table table-responsive" id="preferenciaSaidas-table">
    <thead>
        <tr>
            <th>Descricao</th>
        <th>Ativo</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($preferenciaSaidas as $preferenciaSaida)
        <tr>
            <td>{!! $preferenciaSaida->descricao !!}</td>
            <td>{!! $preferenciaSaida->ativo !!}</td>
            <td>
                {!! Form::open(['route' => ['preferenciaSaidas.destroy', $preferenciaSaida->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('preferenciaSaidas.show', [$preferenciaSaida->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('preferenciaSaidas.edit', [$preferenciaSaida->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
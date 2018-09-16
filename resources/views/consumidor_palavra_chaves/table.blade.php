<table class="table table-responsive" id="consumidorPalavraChaves-table">
    <thead>
        <tr>
            <th>Idconsumidor</th>
        <th>Idpalavra</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($consumidorPalavraChaves as $consumidorPalavraChave)
        <tr>
            <td>{!! $consumidorPalavraChave->idconsumidor !!}</td>
            <td>{!! $consumidorPalavraChave->idpalavra !!}</td>
            <td>
                {!! Form::open(['route' => ['consumidorPalavraChaves.destroy', $consumidorPalavraChave->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('consumidorPalavraChaves.show', [$consumidorPalavraChave->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('consumidorPalavraChaves.edit', [$consumidorPalavraChave->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
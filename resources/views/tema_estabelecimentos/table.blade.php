<table class="table table-responsive" id="temaEstabelecimentos-table">
    <thead>
        <tr>
            <th>Descricao</th>
        <th>Ativo</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($temaEstabelecimentos as $temaEstabelecimento)
        <tr>
            <td>{!! $temaEstabelecimento->descricao !!}</td>
            <td>{!! $temaEstabelecimento->ativo !!}</td>
            <td>
                {!! Form::open(['route' => ['temaEstabelecimentos.destroy', $temaEstabelecimento->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('temaEstabelecimentos.show', [$temaEstabelecimento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('temaEstabelecimentos.edit', [$temaEstabelecimento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
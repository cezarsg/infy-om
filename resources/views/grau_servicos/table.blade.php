<table class="table table-responsive" id="grauServicos-table">
    <thead>
        <tr>
            <th>Descricao</th>
        <th>Nome</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($grauServicos as $grauServico)
        <tr>
            <td>{!! $grauServico->descricao !!}</td>
            <td>{!! $grauServico->nome !!}</td>
            <td>
                {!! Form::open(['route' => ['grauServicos.destroy', $grauServico->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('grauServicos.show', [$grauServico->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('grauServicos.edit', [$grauServico->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
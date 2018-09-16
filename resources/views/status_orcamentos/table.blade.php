<table class="table table-responsive" id="statusOrcamentos-table">
    <thead>
        <tr>
            <th>Descricao</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($statusOrcamentos as $statusOrcamento)
        <tr>
            <td>{!! $statusOrcamento->descricao !!}</td>
            <td>
                {!! Form::open(['route' => ['statusOrcamentos.destroy', $statusOrcamento->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('statusOrcamentos.show', [$statusOrcamento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('statusOrcamentos.edit', [$statusOrcamento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
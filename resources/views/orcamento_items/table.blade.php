<table class="table table-responsive" id="orcamentoItems-table">
    <thead>
        <tr>
            <th>Idorcamento</th>
        <th>Descricao</th>
        <th>Quantidade</th>
        <th>Vlrunitario</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orcamentoItems as $orcamentoItem)
        <tr>
            <td>{!! $orcamentoItem->idorcamento !!}</td>
            <td>{!! $orcamentoItem->descricao !!}</td>
            <td>{!! $orcamentoItem->quantidade !!}</td>
            <td>{!! $orcamentoItem->vlrunitario !!}</td>
            <td>
                {!! Form::open(['route' => ['orcamentoItems.destroy', $orcamentoItem->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('orcamentoItems.show', [$orcamentoItem->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('orcamentoItems.edit', [$orcamentoItem->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
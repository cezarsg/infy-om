<table class="table table-responsive" id="orcamentoMensagens-table">
    <thead>
        <tr>
            <th>Idorcamento</th>
        <th>Tipomensagem</th>
        <th>Idpergunta</th>
        <th>Dt. Inclusão</th>
        <th>Mensagem</th>
        <th>Incluidapor</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orcamentoMensagens as $orcamentoMensagens)
        <tr>
            <td>{!! $orcamentoMensagens->idorcamento !!}</td>
            <td>{!! $orcamentoMensagens->tipomensagem !!}</td>
            <td>{!! $orcamentoMensagens->idPergunta !!}</td>
            <td>{!! $orcamentoMensagens->Dt. Inclusão !!}</td>
            <td>{!! $orcamentoMensagens->mensagem !!}</td>
            <td>{!! $orcamentoMensagens->incluidapor !!}</td>
            <td>
                {!! Form::open(['route' => ['orcamentoMensagens.destroy', $orcamentoMensagens->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('orcamentoMensagens.show', [$orcamentoMensagens->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('orcamentoMensagens.edit', [$orcamentoMensagens->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
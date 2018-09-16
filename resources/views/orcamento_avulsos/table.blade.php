<table class="table table-responsive" id="orcamentoAvulsos-table">
    <thead>
        <tr>
            <th>Idanuncio</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Dtevento</th>
        <th>Localizacao</th>
        <th>Dsevento</th>
        <th>Dt. Inclusão</th>
        <th>Ativo</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orcamentoAvulsos as $orcamentoAvulso)
        <tr>
            <td>{!! $orcamentoAvulso->idanuncio !!}</td>
            <td>{!! $orcamentoAvulso->nome !!}</td>
            <td>{!! $orcamentoAvulso->email !!}</td>
            <td>{!! $orcamentoAvulso->telefone !!}</td>
            <td>{!! $orcamentoAvulso->dtevento !!}</td>
            <td>{!! $orcamentoAvulso->localizacao !!}</td>
            <td>{!! $orcamentoAvulso->dsevento !!}</td>
            <td>{!! $orcamentoAvulso->Dt. Inclusão !!}</td>
            <td>{!! $orcamentoAvulso->ativo !!}</td>
            <td>
                {!! Form::open(['route' => ['orcamentoAvulsos.destroy', $orcamentoAvulso->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('orcamentoAvulsos.show', [$orcamentoAvulso->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('orcamentoAvulsos.edit', [$orcamentoAvulso->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
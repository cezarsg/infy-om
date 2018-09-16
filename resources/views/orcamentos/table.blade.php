<table class="table table-responsive" id="orcamentos-table">
    <thead>
        <tr>
            <th>Descricaoservico</th>
        <th>Idservico</th>
        <th>Idstatus</th>
        <th>Idevento</th>
        <th>Idanuncio</th>
        <th>Dtvalidade</th>
        <th>Dt. Inclusão</th>
        <th>Dtresposta</th>
        <th>Dt. Alteração</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orcamentos as $orcamento)
        <tr>
            <td>{!! $orcamento->descricaoservico !!}</td>
            <td>{!! $orcamento->idservico !!}</td>
            <td>{!! $orcamento->idstatus !!}</td>
            <td>{!! $orcamento->idevento !!}</td>
            <td>{!! $orcamento->idanuncio !!}</td>
            <td>{!! $orcamento->dtvalidade !!}</td>
            <td>{!! $orcamento->Dt. Inclusão !!}</td>
            <td>{!! $orcamento->dtresposta !!}</td>
            <td>{!! $orcamento->Dt. Alteração !!}</td>
            <td>
                {!! Form::open(['route' => ['orcamentos.destroy', $orcamento->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('orcamentos.show', [$orcamento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('orcamentos.edit', [$orcamento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
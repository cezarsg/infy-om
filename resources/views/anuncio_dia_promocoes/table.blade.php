<table class="table table-responsive" id="anuncioDiaPromocoes-table">
    <thead>
        <tr>
            <th>Idanuncio</th>
        <th>Nome</th>
        <th>Descricao</th>
        <th>Datainicial</th>
        <th>Datafinal</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($anuncioDiaPromocoes as $anuncioDiaPromocoes)
        <tr>
            <td>{!! $anuncioDiaPromocoes->idanuncio !!}</td>
            <td>{!! $anuncioDiaPromocoes->nome !!}</td>
            <td>{!! $anuncioDiaPromocoes->descricao !!}</td>
            <td>{!! $anuncioDiaPromocoes->dataInicial !!}</td>
            <td>{!! $anuncioDiaPromocoes->dataFinal !!}</td>
            <td>
                {!! Form::open(['route' => ['anuncioDiaPromocoes.destroy', $anuncioDiaPromocoes->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('anuncioDiaPromocoes.show', [$anuncioDiaPromocoes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('anuncioDiaPromocoes.edit', [$anuncioDiaPromocoes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
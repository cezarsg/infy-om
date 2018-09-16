<table class="table table-responsive" id="anuncianteDiaPromocoes-table">
    <thead>
        <tr>
            <th>Idanunciante</th>
        <th>Datainicial</th>
        <th>Datafinal</th>
        <th>Descricao</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($anuncianteDiaPromocoes as $anuncianteDiaPromocoes)
        <tr>
            <td>{!! $anuncianteDiaPromocoes->idanunciante !!}</td>
            <td>{!! $anuncianteDiaPromocoes->datainicial !!}</td>
            <td>{!! $anuncianteDiaPromocoes->datafinal !!}</td>
            <td>{!! $anuncianteDiaPromocoes->descricao !!}</td>
            <td>
                {!! Form::open(['route' => ['anuncianteDiaPromocoes.destroy', $anuncianteDiaPromocoes->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('anuncianteDiaPromocoes.show', [$anuncianteDiaPromocoes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('anuncianteDiaPromocoes.edit', [$anuncianteDiaPromocoes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
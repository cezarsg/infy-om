<table class="table table-responsive" id="anuncioAvaliacaos-table">
    <thead>
        <tr>
            <th>Idanuncio</th>
        <th>Nrestrelas</th>
        <th>Observacao</th>
        <th>Idusuario</th>
        <th>Dtinclusao</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($anuncioAvaliacaos as $anuncioAvaliacao)
        <tr>
            <td>{!! $anuncioAvaliacao->idanuncio !!}</td>
            <td>{!! $anuncioAvaliacao->nrestrelas !!}</td>
            <td>{!! $anuncioAvaliacao->observacao !!}</td>
            <td>{!! $anuncioAvaliacao->idusuario !!}</td>
            <td>{!! $anuncioAvaliacao->dtinclusao !!}</td>
            <td>
                {!! Form::open(['route' => ['anuncioAvaliacaos.destroy', $anuncioAvaliacao->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('anuncioAvaliacaos.show', [$anuncioAvaliacao->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('anuncioAvaliacaos.edit', [$anuncioAvaliacao->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
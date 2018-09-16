<table class="table table-responsive" id="anuncioTemaEstabelecimentos-table">
    <thead>
        <tr>
            <th>Idanuncio</th>
        <th>Idtemaestabelecimento</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($anuncioTemaEstabelecimentos as $anuncioTemaEstabelecimento)
        <tr>
            <td>{!! $anuncioTemaEstabelecimento->idanuncio !!}</td>
            <td>{!! $anuncioTemaEstabelecimento->idtemaestabelecimento !!}</td>
            <td>
                {!! Form::open(['route' => ['anuncioTemaEstabelecimentos.destroy', $anuncioTemaEstabelecimento->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('anuncioTemaEstabelecimentos.show', [$anuncioTemaEstabelecimento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('anuncioTemaEstabelecimentos.edit', [$anuncioTemaEstabelecimento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<table class="table table-responsive" id="anuncianteTemaEstabelecimentos-table">
    <thead>
        <tr>
            <th>Idanunciante</th>
        <th>Idtemaestabelecimento</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($anuncianteTemaEstabelecimentos as $anuncianteTemaEstabelecimento)
        <tr>
            <td>{!! $anuncianteTemaEstabelecimento->idanunciante !!}</td>
            <td>{!! $anuncianteTemaEstabelecimento->idtemaestabelecimento !!}</td>
            <td>
                {!! Form::open(['route' => ['anuncianteTemaEstabelecimentos.destroy', $anuncianteTemaEstabelecimento->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('anuncianteTemaEstabelecimentos.show', [$anuncianteTemaEstabelecimento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('anuncianteTemaEstabelecimentos.edit', [$anuncianteTemaEstabelecimento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
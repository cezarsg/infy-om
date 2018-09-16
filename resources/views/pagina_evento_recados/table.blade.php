<table class="table table-responsive" id="paginaEventoRecados-table">
    <thead>
        <tr>
            <th>Idpagina</th>
        <th>Nome</th>
        <th>Mensagem</th>
        <th>Dt. Inclusão</th>
        <th>Idaprovado</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($paginaEventoRecados as $paginaEventoRecado)
        <tr>
            <td>{!! $paginaEventoRecado->idpagina !!}</td>
            <td>{!! $paginaEventoRecado->nome !!}</td>
            <td>{!! $paginaEventoRecado->mensagem !!}</td>
            <td>{!! $paginaEventoRecado->Dt. Inclusão !!}</td>
            <td>{!! $paginaEventoRecado->idaprovado !!}</td>
            <td>
                {!! Form::open(['route' => ['paginaEventoRecados.destroy', $paginaEventoRecado->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('paginaEventoRecados.show', [$paginaEventoRecado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('paginaEventoRecados.edit', [$paginaEventoRecado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
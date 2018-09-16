<table class="table table-responsive" id="paginaEventoPosts-table">
    <thead>
        <tr>
            <th>Idpagina</th>
        <th>Titulo</th>
        <th>Conteudo</th>
        <th>Dt. Inclusão</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($paginaEventoPosts as $paginaEventoPost)
        <tr>
            <td>{!! $paginaEventoPost->idpagina !!}</td>
            <td>{!! $paginaEventoPost->titulo !!}</td>
            <td>{!! $paginaEventoPost->conteudo !!}</td>
            <td>{!! $paginaEventoPost->Dt. Inclusão !!}</td>
            <td>
                {!! Form::open(['route' => ['paginaEventoPosts.destroy', $paginaEventoPost->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('paginaEventoPosts.show', [$paginaEventoPost->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('paginaEventoPosts.edit', [$paginaEventoPost->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<table class="table table-responsive" id="paginaEventoVideos-table">
    <thead>
        <tr>
            <th>Idpagina</th>
        <th>Video</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($paginaEventoVideos as $paginaEventoVideo)
        <tr>
            <td>{!! $paginaEventoVideo->idpagina !!}</td>
            <td>{!! $paginaEventoVideo->video !!}</td>
            <td>
                {!! Form::open(['route' => ['paginaEventoVideos.destroy', $paginaEventoVideo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('paginaEventoVideos.show', [$paginaEventoVideo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('paginaEventoVideos.edit', [$paginaEventoVideo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
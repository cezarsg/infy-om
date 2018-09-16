<table class="table table-responsive" id="paginaEventoFotos-table">
    <thead>
        <tr>
            <th>Idpagina</th>
        <th>Fotocaminho</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($paginaEventoFotos as $paginaEventoFotos)
        <tr>
            <td>{!! $paginaEventoFotos->idpagina !!}</td>
            <td>{!! $paginaEventoFotos->fotocaminho !!}</td>
            <td>
                {!! Form::open(['route' => ['paginaEventoFotos.destroy', $paginaEventoFotos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('paginaEventoFotos.show', [$paginaEventoFotos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('paginaEventoFotos.edit', [$paginaEventoFotos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
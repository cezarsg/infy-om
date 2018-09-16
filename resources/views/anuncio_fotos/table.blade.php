<table class="table table-responsive" id="anuncioFotos-table">
    <thead>
        <tr>
            <th>Idanuncio</th>
        <th>Fotocaminho</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($anuncioFotos as $anuncioFotos)
        <tr>
            <td>{!! $anuncioFotos->idanuncio !!}</td>
            <td>{!! $anuncioFotos->fotocaminho !!}</td>
            <td>
                {!! Form::open(['route' => ['anuncioFotos.destroy', $anuncioFotos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('anuncioFotos.show', [$anuncioFotos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('anuncioFotos.edit', [$anuncioFotos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
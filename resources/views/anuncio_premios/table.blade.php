<table class="table table-responsive" id="anuncioPremios-table">
    <thead>
        <tr>
            <th>Idanuncio</th>
        <th>Fotopremiocaminho</th>
        <th>Descricao</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($anuncioPremios as $anuncioPremios)
        <tr>
            <td>{!! $anuncioPremios->idanuncio !!}</td>
            <td>{!! $anuncioPremios->fotopremiocaminho !!}</td>
            <td>{!! $anuncioPremios->descricao !!}</td>
            <td>
                {!! Form::open(['route' => ['anuncioPremios.destroy', $anuncioPremios->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('anuncioPremios.show', [$anuncioPremios->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('anuncioPremios.edit', [$anuncioPremios->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<table class="table table-responsive" id="anuncioVideos-table">
    <thead>
        <tr>
            <th>Idanuncio</th>
        <th>Video</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($anuncioVideos as $anuncioVideos)
        <tr>
            <td>{!! $anuncioVideos->idanuncio !!}</td>
            <td>{!! $anuncioVideos->video !!}</td>
            <td>
                {!! Form::open(['route' => ['anuncioVideos.destroy', $anuncioVideos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('anuncioVideos.show', [$anuncioVideos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('anuncioVideos.edit', [$anuncioVideos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
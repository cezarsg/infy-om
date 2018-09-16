<table class="table table-responsive" id="anuncioAbrangenciaAtuacaos-table">
    <thead>
        <tr>
            <th>Idanuncio</th>
        <th>Abrangencia</th>
        <th>Idestado</th>
        <th>Idcidade</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($anuncioAbrangenciaAtuacaos as $anuncioAbrangenciaAtuacao)
        <tr>
            <td>{!! $anuncioAbrangenciaAtuacao->idanuncio !!}</td>
            <td>{!! $anuncioAbrangenciaAtuacao->abrangencia !!}</td>
            <td>{!! $anuncioAbrangenciaAtuacao->idestado !!}</td>
            <td>{!! $anuncioAbrangenciaAtuacao->idcidade !!}</td>
            <td>
                {!! Form::open(['route' => ['anuncioAbrangenciaAtuacaos.destroy', $anuncioAbrangenciaAtuacao->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('anuncioAbrangenciaAtuacaos.show', [$anuncioAbrangenciaAtuacao->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('anuncioAbrangenciaAtuacaos.edit', [$anuncioAbrangenciaAtuacao->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
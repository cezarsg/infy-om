<table class="table table-responsive" id="anuncioHorarioAtendimentos-table">
    <thead>
        <tr>
            <th>Idanuncio</th>
        <th>Diainicial</th>
        <th>Diafinal</th>
        <th>Horainicial</th>
        <th>Horafinal</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($anuncioHorarioAtendimentos as $anuncioHorarioAtendimento)
        <tr>
            <td>{!! $anuncioHorarioAtendimento->idanuncio !!}</td>
            <td>{!! $anuncioHorarioAtendimento->diainicial !!}</td>
            <td>{!! $anuncioHorarioAtendimento->diafinal !!}</td>
            <td>{!! $anuncioHorarioAtendimento->horainicial !!}</td>
            <td>{!! $anuncioHorarioAtendimento->horafinal !!}</td>
            <td>
                {!! Form::open(['route' => ['anuncioHorarioAtendimentos.destroy', $anuncioHorarioAtendimento->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('anuncioHorarioAtendimentos.show', [$anuncioHorarioAtendimento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('anuncioHorarioAtendimentos.edit', [$anuncioHorarioAtendimento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
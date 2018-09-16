<table class="table table-responsive" id="anunciantehistoricos-table">
    <thead>
        <tr>
            <th>Idanunciante</th>
        <th>Dt. Inclusão</th>
        <th>Observacao</th>
        <th>Idstatus</th>
        <th>Idusuario</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($anunciantehistoricos as $anunciantehistorico)
        <tr>
            <td>{!! $anunciantehistorico->idanunciante !!}</td>
            <td>{!! $anunciantehistorico->Dt. Inclusão !!}</td>
            <td>{!! $anunciantehistorico->observacao !!}</td>
            <td>{!! $anunciantehistorico->idstatus !!}</td>
            <td>{!! $anunciantehistorico->idusuario !!}</td>
            <td>
                {!! Form::open(['route' => ['anunciantehistoricos.destroy', $anunciantehistorico->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('anunciantehistoricos.show', [$anunciantehistorico->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('anunciantehistoricos.edit', [$anunciantehistorico->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
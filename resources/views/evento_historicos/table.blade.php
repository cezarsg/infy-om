<table class="table table-responsive" id="eventoHistoricos-table">
    <thead>
        <tr>
            <th>Idevento</th>
        <th>Dt. Inclusão</th>
        <th>Observacao</th>
        <th>Idstatus</th>
        <th>Idusuario</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($eventoHistoricos as $eventoHistorico)
        <tr>
            <td>{!! $eventoHistorico->idevento !!}</td>
            <td>{!! $eventoHistorico->Dt. Inclusão !!}</td>
            <td>{!! $eventoHistorico->observacao !!}</td>
            <td>{!! $eventoHistorico->idstatus !!}</td>
            <td>{!! $eventoHistorico->idusuario !!}</td>
            <td>
                {!! Form::open(['route' => ['eventoHistoricos.destroy', $eventoHistorico->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('eventoHistoricos.show', [$eventoHistorico->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('eventoHistoricos.edit', [$eventoHistorico->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
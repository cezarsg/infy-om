<table class="table table-responsive" id="consumidorHistoricos-table">
    <thead>
        <tr>
            <th>Idconsumidor</th>
        <th>Dtinclusao</th>
        <th>Observacao</th>
        <th>Idstatus</th>
        <th>Idusuario</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($consumidorHistoricos as $consumidorHistorico)
        <tr>
            <td>{!! $consumidorHistorico->idconsumidor !!}</td>
            <td>{!! $consumidorHistorico->dtinclusao !!}</td>
            <td>{!! $consumidorHistorico->observacao !!}</td>
            <td>{!! $consumidorHistorico->idstatus !!}</td>
            <td>{!! $consumidorHistorico->idusuario !!}</td>
            <td>
                {!! Form::open(['route' => ['consumidorHistoricos.destroy', $consumidorHistorico->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('consumidorHistoricos.show', [$consumidorHistorico->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('consumidorHistoricos.edit', [$consumidorHistorico->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
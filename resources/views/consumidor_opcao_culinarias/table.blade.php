<table class="table table-responsive" id="consumidorOpcaoCulinarias-table">
    <thead>
        <tr>
            <th>Idconsumidor</th>
        <th>Idopcaoculinaria</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($consumidorOpcaoCulinarias as $consumidorOpcaoCulinaria)
        <tr>
            <td>{!! $consumidorOpcaoCulinaria->idconsumidor !!}</td>
            <td>{!! $consumidorOpcaoCulinaria->idopcaoculinaria !!}</td>
            <td>
                {!! Form::open(['route' => ['consumidorOpcaoCulinarias.destroy', $consumidorOpcaoCulinaria->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('consumidorOpcaoCulinarias.show', [$consumidorOpcaoCulinaria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('consumidorOpcaoCulinarias.edit', [$consumidorOpcaoCulinaria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
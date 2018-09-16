<table class="table table-responsive" id="consumidors-table">
    <thead>
        <tr>
            <th>Nome</th>
        <th>Sobrenome</th>
        <th>Sexo</th>
        <th>Dtnascimento</th>
        <th>Idcidade</th>
        <th>Fotodestaquecaminho</th>
        <th>Dtinclusao</th>
        <th>Dtalteracao</th>
        <th>Idusuario</th>
        <th>Ativo</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($consumidors as $consumidor)
        <tr>
            <td>{!! $consumidor->nome !!}</td>
            <td>{!! $consumidor->sobrenome !!}</td>
            <td>{!! $consumidor->sexo !!}</td>
            <td>{!! $consumidor->dtnascimento !!}</td>
            <td>{!! $consumidor->idcidade !!}</td>
            <td>{!! $consumidor->fotodestaquecaminho !!}</td>
            <td>{!! $consumidor->dtinclusao !!}</td>
            <td>{!! $consumidor->dtalteracao !!}</td>
            <td>{!! $consumidor->idusuario !!}</td>
            <td>{!! $consumidor->ativo !!}</td>
            <td>
                {!! Form::open(['route' => ['consumidors.destroy', $consumidor->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('consumidors.show', [$consumidor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('consumidors.edit', [$consumidor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
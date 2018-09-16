<table class="table table-responsive" id="eventoConvidados-table">
    <thead>
        <tr>
            <th>Idevento</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Apelido</th>
        <th>Confirmado</th>
        <th>Emailenviado</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($eventoConvidados as $eventoConvidados)
        <tr>
            <td>{!! $eventoConvidados->idevento !!}</td>
            <td>{!! $eventoConvidados->nome !!}</td>
            <td>{!! $eventoConvidados->email !!}</td>
            <td>{!! $eventoConvidados->apelido !!}</td>
            <td>{!! $eventoConvidados->confirmado !!}</td>
            <td>{!! $eventoConvidados->emailenviado !!}</td>
            <td>
                {!! Form::open(['route' => ['eventoConvidados.destroy', $eventoConvidados->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('eventoConvidados.show', [$eventoConvidados->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('eventoConvidados.edit', [$eventoConvidados->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
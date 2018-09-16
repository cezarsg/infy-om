<table class="table table-responsive" id="eventoConvites-table">
    <thead>
        <tr>
            <th>Quemconvida</th>
        <th>Titulo</th>
        <th>Mensagem</th>
        <th>Fotocaminho</th>
        <th>Idevento</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($eventoConvites as $eventoConvite)
        <tr>
            <td>{!! $eventoConvite->quemconvida !!}</td>
            <td>{!! $eventoConvite->titulo !!}</td>
            <td>{!! $eventoConvite->mensagem !!}</td>
            <td>{!! $eventoConvite->fotocaminho !!}</td>
            <td>{!! $eventoConvite->idevento !!}</td>
            <td>
                {!! Form::open(['route' => ['eventoConvites.destroy', $eventoConvite->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('eventoConvites.show', [$eventoConvite->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('eventoConvites.edit', [$eventoConvite->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
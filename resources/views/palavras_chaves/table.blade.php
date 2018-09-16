<table class="table table-responsive" id="palavrasChaves-table">
    <thead>
        <tr>
            <th>Descricao</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($palavrasChaves as $palavrasChave)
        <tr>
            <td>{!! $palavrasChave->descricao !!}</td>
            <td>
                {!! Form::open(['route' => ['palavrasChaves.destroy', $palavrasChave->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('palavrasChaves.show', [$palavrasChave->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('palavrasChaves.edit', [$palavrasChave->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
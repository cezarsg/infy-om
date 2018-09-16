<table class="table table-responsive" id="palavrasChaveNegativas-table">
    <thead>
        <tr>
            <th>Palavra</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($palavrasChaveNegativas as $palavrasChaveNegativas)
        <tr>
            <td>{!! $palavrasChaveNegativas->palavra !!}</td>
            <td>
                {!! Form::open(['route' => ['palavrasChaveNegativas.destroy', $palavrasChaveNegativas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('palavrasChaveNegativas.show', [$palavrasChaveNegativas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('palavrasChaveNegativas.edit', [$palavrasChaveNegativas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
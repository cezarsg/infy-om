<table class="table table-responsive" id="ramoNegocios-table">
    <thead>
        <tr>
            <th>Descricao</th>
        <th>Nome</th>
        <th>Ativo</th>
        <th>Exigenrconvidados</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($ramoNegocios as $ramoNegocio)
        <tr>
            <td>{!! $ramoNegocio->descricao !!}</td>
            <td>{!! $ramoNegocio->nome !!}</td>
            <td>{!! $ramoNegocio->ativo !!}</td>
            <td>{!! $ramoNegocio->exigenrconvidados !!}</td>
            <td>
                {!! Form::open(['route' => ['ramoNegocios.destroy', $ramoNegocio->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('ramoNegocios.show', [$ramoNegocio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('ramoNegocios.edit', [$ramoNegocio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
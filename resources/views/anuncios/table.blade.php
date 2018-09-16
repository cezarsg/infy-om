<table class="table table-responsive" id="anuncios-table">
    <thead>
        <tr>
            <th>Idanunciante</th>
        <th>Dtinclusao</th>
        <th>Dtalteracao</th>
        <th>Idstatus</th>
        <th>Idramonegocio</th>
        <th>Estabelecimentoproprio</th>
        <th>Qtdemaximapessoasporevento</th>
        <th>Informacoesimportantes</th>
        <th>Fotodestaquecaminho</th>
        <th>Score</th>
        <th>Idusuario</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($anuncios as $anuncio)
        <tr>
            <td>{!! $anuncio->idanunciante !!}</td>
            <td>{!! $anuncio->dtinclusao !!}</td>
            <td>{!! $anuncio->dtalteracao !!}</td>
            <td>{!! $anuncio->idstatus !!}</td>
            <td>{!! $anuncio->idramonegocio !!}</td>
            <td>{!! $anuncio->estabelecimentoproprio !!}</td>
            <td>{!! $anuncio->qtdemaximapessoasporevento !!}</td>
            <td>{!! $anuncio->informacoesimportantes !!}</td>
            <td>{!! $anuncio->fotodestaquecaminho !!}</td>
            <td>{!! $anuncio->score !!}</td>
            <td>{!! $anuncio->idusuario !!}</td>
            <td>
                {!! Form::open(['route' => ['anuncios.destroy', $anuncio->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('anuncios.show', [$anuncio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('anuncios.edit', [$anuncio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
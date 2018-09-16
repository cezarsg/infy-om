<table class="table table-responsive" id="anunciantes-table">
    <thead>
        <tr>
            <th>Razaosocial</th>
        <th>Nomefantasia</th>
        <th>Cnpj</th>
        <th>Cpf</th>
        <th>Telefone</th>
        <th>Endereco</th>
        <th>Numero</th>
        <th>Cep</th>
        <th>Complemento</th>
        <th>Bairro</th>
        <th>Cidade</th>
        <th>Estado</th>
        <th>Facebook</th>
        <th>Linkedin</th>
        <th>Instagram</th>
        <th>Twitter</th>
        <th>Pinterest</th>
        <th>Idusuarioanunciante</th>
        <th>Dt. Inclusão</th>
        <th>Dt. Alteração</th>
        <th>Ativo</th>
        <th>Aprovado</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($anunciantes as $anunciante)
        <tr>
            <td>{!! $anunciante->razaosocial !!}</td>
            <td>{!! $anunciante->nomefantasia !!}</td>
            <td>{!! $anunciante->CNPJ !!}</td>
            <td>{!! $anunciante->CPF !!}</td>
            <td>{!! $anunciante->telefone !!}</td>
            <td>{!! $anunciante->endereco !!}</td>
            <td>{!! $anunciante->numero !!}</td>
            <td>{!! $anunciante->CEP !!}</td>
            <td>{!! $anunciante->complemento !!}</td>
            <td>{!! $anunciante->bairro !!}</td>
            <td>{!! $anunciante->cidade !!}</td>
            <td>{!! $anunciante->estado !!}</td>
            <td>{!! $anunciante->facebook !!}</td>
            <td>{!! $anunciante->linkedin !!}</td>
            <td>{!! $anunciante->instagram !!}</td>
            <td>{!! $anunciante->twitter !!}</td>
            <td>{!! $anunciante->pinterest !!}</td>
            <td>{!! $anunciante->idusuarioanunciante !!}</td>
            <td>{!! $anunciante->Dt. Inclusão !!}</td>
            <td>{!! $anunciante->Dt. Alteração !!}</td>
            <td>{!! $anunciante->ativo !!}</td>
            <td>{!! $anunciante->aprovado !!}</td>
            <td>
                {!! Form::open(['route' => ['anunciantes.destroy', $anunciante->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('anunciantes.show', [$anunciante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('anunciantes.edit', [$anunciante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<table class="table table-responsive" id="eventos-table">
    <thead>
        <tr>
            <th>Nome</th>
        <th>Idtipoevento</th>
        <th>Idtemaestabelecimento</th>
        <th>Descricao</th>
        <th>Eventofechado</th>
        <th>Dtevento</th>
        <th>Horaevento</th>
        <th>Unicodia</th>
        <th>Dteventotermino</th>
        <th>Nrconvidados</th>
        <th>Nrpessoasesperado</th>
        <th>Urllistapresentes</th>
        <th>Vlrorcamento</th>
        <th>Urlcompraingressos</th>
        <th>Faixaetariainicial</th>
        <th>Faixaetariafinal</th>
        <th>Genero</th>
        <th>Idgrau</th>
        <th>Guiadeeventos</th>
        <th>Dtprazomaxconfconvite</th>
        <th>Idconsumidor</th>
        <th>Idstatus</th>
        <th>Endereco</th>
        <th>Numero</th>
        <th>Cep</th>
        <th>Complemento</th>
        <th>Bairro</th>
        <th>Cidade</th>
        <th>Estado</th>
        <th>Dt. Inclusão</th>
        <th>Dt. Alteração</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($eventos as $evento)
        <tr>
            <td>{!! $evento->nome !!}</td>
            <td>{!! $evento->idtipoevento !!}</td>
            <td>{!! $evento->idtemaestabelecimento !!}</td>
            <td>{!! $evento->descricao !!}</td>
            <td>{!! $evento->eventofechado !!}</td>
            <td>{!! $evento->dtevento !!}</td>
            <td>{!! $evento->horaevento !!}</td>
            <td>{!! $evento->unicodia !!}</td>
            <td>{!! $evento->dteventotermino !!}</td>
            <td>{!! $evento->nrconvidados !!}</td>
            <td>{!! $evento->nrpessoasesperado !!}</td>
            <td>{!! $evento->urllistapresentes !!}</td>
            <td>{!! $evento->vlrorcamento !!}</td>
            <td>{!! $evento->urlcompraingressos !!}</td>
            <td>{!! $evento->faixaetariainicial !!}</td>
            <td>{!! $evento->faixaetariafinal !!}</td>
            <td>{!! $evento->genero !!}</td>
            <td>{!! $evento->idgrau !!}</td>
            <td>{!! $evento->guiadeeventos !!}</td>
            <td>{!! $evento->dtprazomaxconfconvite !!}</td>
            <td>{!! $evento->idconsumidor !!}</td>
            <td>{!! $evento->idstatus !!}</td>
            <td>{!! $evento->endereco !!}</td>
            <td>{!! $evento->numero !!}</td>
            <td>{!! $evento->CEP !!}</td>
            <td>{!! $evento->complemento !!}</td>
            <td>{!! $evento->bairro !!}</td>
            <td>{!! $evento->cidade !!}</td>
            <td>{!! $evento->estado !!}</td>
            <td>{!! $evento->Dt. Inclusão !!}</td>
            <td>{!! $evento->Dt. Alteração !!}</td>
            <td>
                {!! Form::open(['route' => ['eventos.destroy', $evento->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('eventos.show', [$evento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('eventos.edit', [$evento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
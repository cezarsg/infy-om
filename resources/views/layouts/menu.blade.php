
<li class="{{ Request::is('tipoEventos*') ? 'active' : '' }}">
    <a href="{!! route('tipoEventos.index') !!}"><i class="fa fa-edit"></i><span>Tipo Eventos</span></a>
</li>

<li class="{{ Request::is('temaEstabelecimentos*') ? 'active' : '' }}">
    <a href="{!! route('temaEstabelecimentos.index') !!}"><i class="fa fa-edit"></i><span>Tema Estabelecimentos</span></a>
</li>

<li class="{{ Request::is('consumidors*') ? 'active' : '' }}">
    <a href="{!! route('consumidors.index') !!}"><i class="fa fa-edit"></i><span>Consumidors</span></a>
</li>

<li class="{{ Request::is('anunciantes*') ? 'active' : '' }}">
    <a href="{!! route('anunciantes.index') !!}"><i class="fa fa-edit"></i><span>Anunciantes</span></a>
</li>

<li class="{{ Request::is('anunciantehistoricos*') ? 'active' : '' }}">
    <a href="{!! route('anunciantehistoricos.index') !!}"><i class="fa fa-edit"></i><span>Anunciantehistoricos</span></a>
</li>

<li class="{{ Request::is('anuncianteDiaPromocoes*') ? 'active' : '' }}">
    <a href="{!! route('anuncianteDiaPromocoes.index') !!}"><i class="fa fa-edit"></i><span>Anunciante Dia Promocoes</span></a>
</li>

<li class="{{ Request::is('anuncianteTemaEstabelecimentos*') ? 'active' : '' }}">
    <a href="{!! route('anuncianteTemaEstabelecimentos.index') !!}"><i class="fa fa-edit"></i><span>Anunciante Tema Estabelecimentos</span></a>
</li>

<li class="{{ Request::is('anuncianteTipoEventos*') ? 'active' : '' }}">
    <a href="{!! route('anuncianteTipoEventos.index') !!}"><i class="fa fa-edit"></i><span>Anunciante Tipo Eventos</span></a>
</li>

<li class="{{ Request::is('anuncios*') ? 'active' : '' }}">
    <a href="{!! route('anuncios.index') !!}"><i class="fa fa-edit"></i><span>Anuncios</span></a>
</li>

<li class="{{ Request::is('anuncioAbrangenciaAtuacaos*') ? 'active' : '' }}">
    <a href="{!! route('anuncioAbrangenciaAtuacaos.index') !!}"><i class="fa fa-edit"></i><span>Anuncio Abrangencia Atuacaos</span></a>
</li>

<li class="{{ Request::is('anuncioAvaliacaos*') ? 'active' : '' }}">
    <a href="{!! route('anuncioAvaliacaos.index') !!}"><i class="fa fa-edit"></i><span>Anuncio Avaliacaos</span></a>
</li>

<li class="{{ Request::is('anuncioDiaPromocoes*') ? 'active' : '' }}">
    <a href="{!! route('anuncioDiaPromocoes.index') !!}"><i class="fa fa-edit"></i><span>Anuncio Dia Promocoes</span></a>
</li>

<li class="{{ Request::is('anuncioFotos*') ? 'active' : '' }}">
    <a href="{!! route('anuncioFotos.index') !!}"><i class="fa fa-edit"></i><span>Anuncio Fotos</span></a>
</li>

<li class="{{ Request::is('anuncioHorarioAtendimentos*') ? 'active' : '' }}">
    <a href="{!! route('anuncioHorarioAtendimentos.index') !!}"><i class="fa fa-edit"></i><span>Anuncio Horario Atendimentos</span></a>
</li>

<li class="{{ Request::is('anuncioPrecoMedioEventos*') ? 'active' : '' }}">
    <a href="{!! route('anuncioPrecoMedioEventos.index') !!}"><i class="fa fa-edit"></i><span>Anuncio Preco Medio Eventos</span></a>
</li>

<li class="{{ Request::is('anuncioPremios*') ? 'active' : '' }}">
    <a href="{!! route('anuncioPremios.index') !!}"><i class="fa fa-edit"></i><span>Anuncio Premios</span></a>
</li>

<li class="{{ Request::is('anuncioTemaEstabelecimentos*') ? 'active' : '' }}">
    <a href="{!! route('anuncioTemaEstabelecimentos.index') !!}"><i class="fa fa-edit"></i><span>Anuncio Tema Estabelecimentos</span></a>
</li>

<li class="{{ Request::is('anuncioVideos*') ? 'active' : '' }}">
    <a href="{!! route('anuncioVideos.index') !!}"><i class="fa fa-edit"></i><span>Anuncio Videos</span></a>
</li>

<li class="{{ Request::is('cidades*') ? 'active' : '' }}">
    <a href="{!! route('cidades.index') !!}"><i class="fa fa-edit"></i><span>Cidades</span></a>
</li>

<li class="{{ Request::is('consumidorHistoricos*') ? 'active' : '' }}">
    <a href="{!! route('consumidorHistoricos.index') !!}"><i class="fa fa-edit"></i><span>Consumidor Historicos</span></a>
</li>

<li class="{{ Request::is('consumidorOpcaoCulinarias*') ? 'active' : '' }}">
    <a href="{!! route('consumidorOpcaoCulinarias.index') !!}"><i class="fa fa-edit"></i><span>Consumidor Opcao Culinarias</span></a>
</li>

<li class="{{ Request::is('consumidorPalavraChaves*') ? 'active' : '' }}">
    <a href="{!! route('consumidorPalavraChaves.index') !!}"><i class="fa fa-edit"></i><span>Consumidor Palavra Chaves</span></a>
</li>

<li class="{{ Request::is('estados*') ? 'active' : '' }}">
    <a href="{!! route('estados.index') !!}"><i class="fa fa-edit"></i><span>Estados</span></a>
</li>

<li class="{{ Request::is('estiloMusicals*') ? 'active' : '' }}">
    <a href="{!! route('estiloMusicals.index') !!}"><i class="fa fa-edit"></i><span>Estilo Musicals</span></a>
</li>

<li class="{{ Request::is('eventos*') ? 'active' : '' }}">
    <a href="{!! route('eventos.index') !!}"><i class="fa fa-edit"></i><span>Eventos</span></a>
</li>

<li class="{{ Request::is('eventoConvidados*') ? 'active' : '' }}">
    <a href="{!! route('eventoConvidados.index') !!}"><i class="fa fa-edit"></i><span>Evento Convidados</span></a>
</li>

<li class="{{ Request::is('eventoConvites*') ? 'active' : '' }}">
    <a href="{!! route('eventoConvites.index') !!}"><i class="fa fa-edit"></i><span>Evento Convites</span></a>
</li>

<li class="{{ Request::is('eventoHistoricos*') ? 'active' : '' }}">
    <a href="{!! route('eventoHistoricos.index') !!}"><i class="fa fa-edit"></i><span>Evento Historicos</span></a>
</li>

<li class="{{ Request::is('eventoMesas*') ? 'active' : '' }}">
    <a href="{!! route('eventoMesas.index') !!}"><i class="fa fa-edit"></i><span>Evento Mesas</span></a>
</li>

<li class="{{ Request::is('eventoPalavrasChaves*') ? 'active' : '' }}">
    <a href="{!! route('eventoPalavrasChaves.index') !!}"><i class="fa fa-edit"></i><span>Evento Palavras Chaves</span></a>
</li>

<li class="{{ Request::is('eventoPublicoAlvos*') ? 'active' : '' }}">
    <a href="{!! route('eventoPublicoAlvos.index') !!}"><i class="fa fa-edit"></i><span>Evento Publico Alvos</span></a>
</li>

<li class="{{ Request::is('eventoServicos*') ? 'active' : '' }}">
    <a href="{!! route('eventoServicos.index') !!}"><i class="fa fa-edit"></i><span>Evento Servicos</span></a>
</li>

<li class="{{ Request::is('grauEventos*') ? 'active' : '' }}">
    <a href="{!! route('grauEventos.index') !!}"><i class="fa fa-edit"></i><span>Grau Eventos</span></a>
</li>

<li class="{{ Request::is('grauServicos*') ? 'active' : '' }}">
    <a href="{!! route('grauServicos.index') !!}"><i class="fa fa-edit"></i><span>Grau Servicos</span></a>
</li>

<li class="{{ Request::is('opcaoCulinarias*') ? 'active' : '' }}">
    <a href="{!! route('opcaoCulinarias.index') !!}"><i class="fa fa-edit"></i><span>Opcao Culinarias</span></a>
</li>

<li class="{{ Request::is('orcamentos*') ? 'active' : '' }}">
    <a href="{!! route('orcamentos.index') !!}"><i class="fa fa-edit"></i><span>Orcamentos</span></a>
</li>

<li class="{{ Request::is('orcamentoAvulsos*') ? 'active' : '' }}">
    <a href="{!! route('orcamentoAvulsos.index') !!}"><i class="fa fa-edit"></i><span>Orcamento Avulsos</span></a>
</li>

<li class="{{ Request::is('orcamentoItems*') ? 'active' : '' }}">
    <a href="{!! route('orcamentoItems.index') !!}"><i class="fa fa-edit"></i><span>Orcamento Items</span></a>
</li>

<li class="{{ Request::is('orcamentoMensagens*') ? 'active' : '' }}">
    <a href="{!! route('orcamentoMensagens.index') !!}"><i class="fa fa-edit"></i><span>Orcamento Mensagens</span></a>
</li>

<li class="{{ Request::is('paginaEventos*') ? 'active' : '' }}">
    <a href="{!! route('paginaEventos.index') !!}"><i class="fa fa-edit"></i><span>Pagina Eventos</span></a>
</li>

<li class="{{ Request::is('paginaEventoFotos*') ? 'active' : '' }}">
    <a href="{!! route('paginaEventoFotos.index') !!}"><i class="fa fa-edit"></i><span>Pagina Evento Fotos</span></a>
</li>

<li class="{{ Request::is('paginaEventoPosts*') ? 'active' : '' }}">
    <a href="{!! route('paginaEventoPosts.index') !!}"><i class="fa fa-edit"></i><span>Pagina Evento Posts</span></a>
</li>

<li class="{{ Request::is('paginaEventoRecados*') ? 'active' : '' }}">
    <a href="{!! route('paginaEventoRecados.index') !!}"><i class="fa fa-edit"></i><span>Pagina Evento Recados</span></a>
</li>

<li class="{{ Request::is('paginaEventoVideos*') ? 'active' : '' }}">
    <a href="{!! route('paginaEventoVideos.index') !!}"><i class="fa fa-edit"></i><span>Pagina Evento Videos</span></a>
</li>

<li class="{{ Request::is('palavrasChaves*') ? 'active' : '' }}">
    <a href="{!! route('palavrasChaves.index') !!}"><i class="fa fa-edit"></i><span>Palavras Chaves</span></a>
</li>

<li class="{{ Request::is('palavrasChaveNegativas*') ? 'active' : '' }}">
    <a href="{!! route('palavrasChaveNegativas.index') !!}"><i class="fa fa-edit"></i><span>Palavras Chave Negativas</span></a>
</li>

<li class="{{ Request::is('preferenciaSaidas*') ? 'active' : '' }}">
    <a href="{!! route('preferenciaSaidas.index') !!}"><i class="fa fa-edit"></i><span>Preferencia Saidas</span></a>
</li>

<li class="{{ Request::is('ramoNegocios*') ? 'active' : '' }}">
    <a href="{!! route('ramoNegocios.index') !!}"><i class="fa fa-edit"></i><span>Ramo Negocios</span></a>
</li>

<li class="{{ Request::is('statusAnunciantes*') ? 'active' : '' }}">
    <a href="{!! route('statusAnunciantes.index') !!}"><i class="fa fa-edit"></i><span>Status Anunciantes</span></a>
</li>

<li class="{{ Request::is('statusConsumidors*') ? 'active' : '' }}">
    <a href="{!! route('statusConsumidors.index') !!}"><i class="fa fa-edit"></i><span>Status Consumidors</span></a>
</li>

<li class="{{ Request::is('statusEventos*') ? 'active' : '' }}">
    <a href="{!! route('statusEventos.index') !!}"><i class="fa fa-edit"></i><span>Status Eventos</span></a>
</li>

<li class="{{ Request::is('statusOrcamentos*') ? 'active' : '' }}">
    <a href="{!! route('statusOrcamentos.index') !!}"><i class="fa fa-edit"></i><span>Status Orcamentos</span></a>
</li>

<li class="{{ Request::is('temaEstabelecimentos*') ? 'active' : '' }}">
    <a href="{!! route('temaEstabelecimentos.index') !!}"><i class="fa fa-edit"></i><span>Tema Estabelecimentos</span></a>
</li>

<li class="{{ Request::is('tipoEventos*') ? 'active' : '' }}">
    <a href="{!! route('tipoEventos.index') !!}"><i class="fa fa-edit"></i><span>Tipo Eventos</span></a>
</li>


-- PAGINATION
php artisan infyom:api $MODEL_NAME --paginate=10


-- Generate Only Specified Views
php artisan infyom:scaffold $MODEL_NAME --views=index,create,edit,show

-- SAVE SCHEMA 
php artisan infyom:scaffold $MODEL_NAME --save

-- Skip File Generation
php artisan infyom:api_scaffold Post --skip=routes,migration,model

-- Rollback Command
$MODEL_NAME - Its a model name for which you want to delete files
$COMMAND_TYPE - Command type from api, scaffold or api_scaffold
php artisan infyom:rollback $MODEL_NAME $COMMAND_TYPE

-- Views Generator Command
php artisan infyom.scaffold:views $MODEL_NAME


--Scaffold Controller Generator Command
php artisan infyom.scaffold:controller $MODEL_NAME 

-- Tests Generator Command
php artisan infyom.api:tests $MODEL_NAME


-- Publish Templates
To use your own templates or for any other customizations, you can publish generator templates and can do whatever changes you want.
php artisan infyom.publish:templates



php artisan infyom:api Consumidor --fromTable --tableName=consumidor
php artisan infyom:api Anunciante --fromTable --tableName=anunciante
php artisan infyom:api Anunciantehistorico	 --fromTable --tableName=anunciantehistorico
php artisan infyom:api AnuncianteDiaPromocoes --fromTable --tableName=anunciantediapromocoes
php artisan infyom:api AnuncianteTemaEstabelecimento --fromTable --tableName=anunciantetemaestabelecimento
php artisan infyom:api AnuncianteTipoEvento --fromTable --tableName=anunciantetipoevento
php artisan infyom:api Anuncio --fromTable --tableName=anuncio
php artisan infyom:api AnuncioAbrangenciaAtuacao --fromTable --tableName=anuncioabrangenciaatuacao
php artisan infyom:api AnuncioAvaliacao --fromTable --tableName=anuncioavaliacao
php artisan infyom:api AnuncioDiaPromocoes --fromTable --tableName=anunciodiapromocoes
php artisan infyom:api AnuncioFotos --fromTable --tableName=anunciofotos
php artisan infyom:api AnuncioHorarioAtendimento --fromTable --tableName=anunciohorarioatendimento
php artisan infyom:api AnuncioPrecoMedioEvento --fromTable --tableName=anuncioprecomedioevento
php artisan infyom:api AnuncioPremios --fromTable --tableName=anunciopremios
php artisan infyom:api AnuncioTemaEstabelecimento --fromTable --tableName=anunciotemaestabelecimento
php artisan infyom:api AnuncioVideos --fromTable --tableName=anunciovideos
php artisan infyom:api Cidade --fromTable --tableName=cidade
php artisan infyom:api ConsumidorHistorico --fromTable --tableName=consumidorhistorico
php artisan infyom:api ConsumidorOpcaoCulinaria --fromTable --tableName=consumidoropcaoculinaria
php artisan infyom:api ConsumidorPalavraChave --fromTable --tableName=consumidorpalavrachave
php artisan infyom:api Estado --fromTable --tableName=estado
php artisan infyom:api EstiloMusical --fromTable --tableName=estilomusical
php artisan infyom:api Evento --fromTable --tableName=evento
php artisan infyom:api EventoConvidados --fromTable --tableName=eventoconvidados
php artisan infyom:api EventoConvite --fromTable --tableName=eventoconvite
php artisan infyom:api EventoHistorico --fromTable --tableName=eventohistorico
php artisan infyom:api EventoMesas --fromTable --tableName=eventomesas
php artisan infyom:api EventoPalavrasChave --fromTable --tableName=eventopalavraschave
php artisan infyom:api EventoPublicoAlvo --fromTable --tableName=eventopublicoalvo
php artisan infyom:api EventoServico --fromTable --tableName=eventoservico
php artisan infyom:api GrauEvento --fromTable --tableName=grauevento
php artisan infyom:api GrauServico --fromTable --tableName=grauservico
php artisan infyom:api OpcaoCulinaria --fromTable --tableName=opcaoculinaria
php artisan infyom:api Orcamento --fromTable --tableName=orcamento
php artisan infyom:api OrcamentoAvulso --fromTable --tableName=orcamentoavulso
php artisan infyom:api OrcamentoItem --fromTable --tableName=orcamentoitem
php artisan infyom:api OrcamentoMensagens --fromTable --tableName=orcamentomensagens
php artisan infyom:api PaginaEvento --fromTable --tableName=paginaevento
php artisan infyom:api PaginaEventoFotos --fromTable --tableName=paginaeventofotos
php artisan infyom:api PaginaEventoPost --fromTable --tableName=paginaeventopost
php artisan infyom:api PaginaEventoRecado --fromTable --tableName=paginaeventorecado
php artisan infyom:api PaginaEventoVideo --fromTable --tableName=paginaeventovideos
php artisan infyom:api PalavrasChave --fromTable --tableName=palavraschave
php artisan infyom:api PalavrasChaveNegativas --fromTable --tableName=palavraschavenegativas
php artisan infyom:api PreferenciaSaida --fromTable --tableName=preferenciasaida
php artisan infyom:api RamoNegocio --fromTable --tableName=ramonegocio
php artisan infyom:api StatusAnunciante --fromTable --tableName=statusanunciante
php artisan infyom:api StatusConsumidor --fromTable --tableName=statusconsumidor
php artisan infyom:api StatusEvento --fromTable --tableName=statusevento
php artisan infyom:api StatusOrcamento --fromTable --tableName=statusorcamento
php artisan infyom:api TemaEstabelecimento --fromTable --tableName=temaestabelecimento
php artisan infyom:api  TipoEvento --fromTable --tableName=tipoevento
php artisan infyom:api TipoEventoRamoNegocio --fromTable --tableName=tipoeventoramonegocio





php artisan infyom:scaffold Consumidor --fromTable --tableName=consumidor  --save  --paginate=10
php artisan infyom:scaffold Anunciante --fromTable --tableName=anunciante --save  --paginate=10
php artisan infyom:scaffold Anunciantehistorico	 --fromTable --tableName=anunciantehistorico --save  --paginate=10
php artisan infyom:scaffold AnuncianteDiaPromocoes --fromTable --tableName=anunciantediapromocoes --save  --paginate=10
php artisan infyom:scaffold AnuncianteTemaEstabelecimento --fromTable --tableName=anunciantetemaestabelecimento --save  --paginate=10
php artisan infyom:scaffold AnuncianteTipoEvento --fromTable --tableName=anunciantetipoevento --save  --paginate=10
php artisan infyom:scaffold Anuncio --fromTable --tableName=anuncio --save  --paginate=10
php artisan infyom:scaffold AnuncioAbrangenciaAtuacao --fromTable --tableName=anuncioabrangenciaatuacao --save  --paginate=10
php artisan infyom:scaffold AnuncioAvaliacao --fromTable --tableName=anuncioavaliacao --save  --paginate=10
php artisan infyom:scaffold AnuncioDiaPromocoes --fromTable --tableName=anunciodiapromocoes --save  --paginate=10
php artisan infyom:scaffold AnuncioFotos --fromTable --tableName=anunciofotos --save  --paginate=10
php artisan infyom:scaffold AnuncioHorarioAtendimento --fromTable --tableName=anunciohorarioatendimento --save  --paginate=10
php artisan infyom:scaffold AnuncioPrecoMedioEvento --fromTable --tableName=anuncioprecomedioevento --save  --paginate=10
php artisan infyom:scaffold AnuncioPremios --fromTable --tableName=anunciopremios --save  --paginate=10
php artisan infyom:scaffold AnuncioTemaEstabelecimento --fromTable --tableName=anunciotemaestabelecimento --save  --paginate=10
php artisan infyom:scaffold AnuncioVideos --fromTable --tableName=anunciovideos --save  --paginate=10
php artisan infyom:scaffold Cidade --fromTable --tableName=cidade --save  --paginate=10
php artisan infyom:scaffold ConsumidorHistorico --fromTable --tableName=consumidorhistorico --save  --paginate=10
php artisan infyom:scaffold ConsumidorOpcaoCulinaria --fromTable --tableName=consumidoropcaoculinaria --save  --paginate=10
php artisan infyom:scaffold ConsumidorPalavraChave --fromTable --tableName=consumidorpalavrachave --save  --paginate=10
php artisan infyom:scaffold Estado --fromTable --tableName=estado --save  --paginate=10
php artisan infyom:scaffold EstiloMusical --fromTable --tableName=estilomusical --save  --paginate=10
php artisan infyom:scaffold Evento --fromTable --tableName=evento --save  --paginate=10
php artisan infyom:scaffold EventoConvidados --fromTable --tableName=eventoconvidados --save  --paginate=10
php artisan infyom:scaffold EventoConvite --fromTable --tableName=eventoconvite --save  --paginate=10
php artisan infyom:scaffold EventoHistorico --fromTable --tableName=eventohistorico --save  --paginate=10
php artisan infyom:scaffold EventoMesas --fromTable --tableName=eventomesas --save  --paginate=10
php artisan infyom:scaffold EventoPalavrasChave --fromTable --tableName=eventopalavraschave --save  --paginate=10
php artisan infyom:scaffold EventoPublicoAlvo --fromTable --tableName=eventopublicoalvo --save  --paginate=10
php artisan infyom:scaffold EventoServico --fromTable --tableName=eventoservico --save  --paginate=10
php artisan infyom:scaffold GrauEvento --fromTable --tableName=grauevento --save  --paginate=10
php artisan infyom:scaffold GrauServico --fromTable --tableName=grauservico --save  --paginate=10
php artisan infyom:scaffold OpcaoCulinaria --fromTable --tableName=opcaoculinaria --save  --paginate=10
php artisan infyom:scaffold Orcamento --fromTable --tableName=orcamento --save  --paginate=10
php artisan infyom:scaffold OrcamentoAvulso --fromTable --tableName=orcamentoavulso --save  --paginate=10
php artisan infyom:scaffold OrcamentoItem --fromTable --tableName=orcamentoitem --save  --paginate=10
php artisan infyom:scaffold OrcamentoMensagens --fromTable --tableName=orcamentomensagens --save  --paginate=10
php artisan infyom:scaffold PaginaEvento --fromTable --tableName=paginaevento --save  --paginate=10
php artisan infyom:scaffold PaginaEventoFotos --fromTable --tableName=paginaeventofotos --save  --paginate=10
php artisan infyom:scaffold PaginaEventoPost --fromTable --tableName=paginaeventopost --save  --paginate=10
php artisan infyom:scaffold PaginaEventoRecado --fromTable --tableName=paginaeventorecado --save  --paginate=10
php artisan infyom:scaffold PaginaEventoVideo --fromTable --tableName=paginaeventovideos --save  --paginate=10
php artisan infyom:scaffold PalavrasChave --fromTable --tableName=palavraschave --save  --paginate=10
php artisan infyom:scaffold PalavrasChaveNegativas --fromTable --tableName=palavraschavenegativas --save  --paginate=10
php artisan infyom:scaffold PreferenciaSaida --fromTable --tableName=preferenciasaida --save  --paginate=10
php artisan infyom:scaffold RamoNegocio --fromTable --tableName=ramonegocio --save  --paginate=10
php artisan infyom:scaffold StatusAnunciante --fromTable --tableName=statusanunciante --save  --paginate=10
php artisan infyom:scaffold StatusConsumidor --fromTable --tableName=statusconsumidor --save  --paginate=10
php artisan infyom:scaffold StatusEvento --fromTable --tableName=statusevento --save  --paginate=10
php artisan infyom:scaffold StatusOrcamento --fromTable --tableName=statusorcamento --save  --paginate=10
php artisan infyom:scaffold TemaEstabelecimento --fromTable --tableName=temaestabelecimento --save  --paginate=10
php artisan infyom:scaffold  TipoEvento --fromTable --tableName=tipoevento --save  --paginate=10
php artisan infyom:scaffold TipoEventoRamoNegocio --fromTable --tableName=tipoeventoramonegocio --save  --paginate=10
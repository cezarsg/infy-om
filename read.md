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
php artisan infyom:scaffold RamoNegocio --fromTable --tableName=ramonegocio
php artisan infyom:api StatusAnunciante --fromTable --tableName=statusanunciante
php artisan infyom:api StatusConsumidor --fromTable --tableName=statusconsumidor
php artisan infyom:api StatusEvento --fromTable --tableName=statusevento
php artisan infyom:api StatusOrcamento --fromTable --tableName=statusorcamento
php artisan infyom:api TemaEstabelecimento --fromTable --tableName=temaestabelecimento
php artisan infyom:scaffold  TipoEvento --fromTable --tableName=tipoevento --save  --paginate=10
php artisan infyom:api TipoEventoRamoNegocio --fromTable --tableName=tipoeventoramonegocio



php artisan infyom:api xxxxx --fromTable --tableName=xxxxx
php artisan infyom:api xxxxx --fromTable --tableName=xxxxx
php artisan infyom:api xxxxx --fromTable --tableName=xxxxx
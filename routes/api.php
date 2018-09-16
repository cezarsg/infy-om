<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::resource('anuncio_abrangencia_atuacaos', 'AnuncioAbrangenciaAtuacaoAPIController');

Route::resource('anuncio_avaliacaos', 'AnuncioAvaliacaoAPIController');

Route::resource('anuncio_dia_promocoes', 'AnuncioDiaPromocoesAPIController');

Route::resource('anuncio_fotos', 'AnuncioFotosAPIController');

Route::resource('anuncio_horario_atendimentos', 'AnuncioHorarioAtendimentoAPIController');

Route::resource('anuncio_preco_medio_eventos', 'AnuncioPrecoMedioEventoAPIController');

Route::resource('anuncio_premios', 'AnuncioPremiosAPIController');

Route::resource('anuncio_tema_estabelecimentos', 'AnuncioTemaEstabelecimentoAPIController');

Route::resource('anuncio_videos', 'AnuncioVideosAPIController');

Route::resource('cidades', 'CidadeAPIController');

Route::resource('consumidor_historicos', 'ConsumidorHistoricoAPIController');

Route::resource('consumidor_opcao_culinarias', 'ConsumidorOpcaoCulinariaAPIController');

Route::resource('consumidor_palavra_chaves', 'ConsumidorPalavraChaveAPIController');

Route::resource('estados', 'EstadoAPIController');

Route::resource('estilo_musicals', 'EstiloMusicalAPIController');

Route::resource('eventos', 'EventoAPIController');

Route::resource('evento_convidados', 'EventoConvidadosAPIController');

Route::resource('evento_convites', 'EventoConviteAPIController');

Route::resource('evento_historicos', 'EventoHistoricoAPIController');

Route::resource('evento_mesas', 'EventoMesasAPIController');

Route::resource('evento_palavras_chaves', 'EventoPalavrasChaveAPIController');

Route::resource('evento_publico_alvos', 'EventoPublicoAlvoAPIController');

Route::resource('evento_servicos', 'EventoServicoAPIController');

Route::resource('grau_eventos', 'GrauEventoAPIController');

Route::resource('grau_servicos', 'GrauServicoAPIController');

Route::resource('opcao_culinarias', 'OpcaoCulinariaAPIController');

Route::resource('orcamentos', 'OrcamentoAPIController');

Route::resource('orcamento_avulsos', 'OrcamentoAvulsoAPIController');

Route::resource('orcamento_items', 'OrcamentoItemAPIController');

Route::resource('orcamento_mensagens', 'OrcamentoMensagensAPIController');

Route::resource('pagina_eventos', 'PaginaEventoAPIController');

Route::resource('pagina_evento_fotos', 'PaginaEventoFotosAPIController');

Route::resource('pagina_evento_posts', 'PaginaEventoPostAPIController');

Route::resource('pagina_evento_recados', 'PaginaEventoRecadoAPIController');

Route::resource('pagina_evento_videos', 'PaginaEventoVideoAPIController');

Route::resource('palavras_chaves', 'PalavrasChaveAPIController');

Route::resource('palavras_chave_negativas', 'PalavrasChaveNegativasAPIController');

Route::resource('preferencia_saidas', 'PreferenciaSaidaAPIController');

Route::resource('ramo_negocios', 'RamoNegocioAPIController');

Route::resource('status_anunciantes', 'StatusAnuncianteAPIController');

Route::resource('status_consumidors', 'StatusConsumidorAPIController');

Route::resource('status_eventos', 'StatusEventoAPIController');

Route::resource('status_orcamentos', 'StatusOrcamentoAPIController');

Route::resource('tema_estabelecimentos', 'TemaEstabelecimentoAPIController');

Route::resource('tipo_eventos', 'TipoEventoAPIController');

Route::resource('tipo_evento_ramo_negocios', 'TipoEventoRamoNegocioAPIController');
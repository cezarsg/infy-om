<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');



Route::resource('tipoEventos', 'TipoEventoController');

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');

Route::resource('ramoNegocios', 'RamoNegocioController');

Route::resource('temaEstabelecimentos', 'TemaEstabelecimentoController');

Route::resource('temaEstabelecimentos', 'TemaEstabelecimentoController');

Route::resource('temaEstabelecimentos', 'TemaEstabelecimentoController');

Route::resource('consumidors', 'ConsumidorController');

Route::resource('anunciantes', 'AnuncianteController');

Route::resource('anunciantehistoricos', 'AnunciantehistoricoController');

Route::resource('anuncianteDiaPromocoes', 'AnuncianteDiaPromocoesController');

Route::resource('anuncianteTemaEstabelecimentos', 'AnuncianteTemaEstabelecimentoController');

Route::resource('anuncianteTipoEventos', 'AnuncianteTipoEventoController');

Route::resource('anuncios', 'AnuncioController');

Route::resource('anuncioAbrangenciaAtuacaos', 'AnuncioAbrangenciaAtuacaoController');

Route::resource('anuncioAvaliacaos', 'AnuncioAvaliacaoController');

Route::resource('anuncioDiaPromocoes', 'AnuncioDiaPromocoesController');

Route::resource('anuncioFotos', 'AnuncioFotosController');

Route::resource('anuncioHorarioAtendimentos', 'AnuncioHorarioAtendimentoController');

Route::resource('anuncioPrecoMedioEventos', 'AnuncioPrecoMedioEventoController');

Route::resource('anuncioPremios', 'AnuncioPremiosController');

Route::resource('anuncioTemaEstabelecimentos', 'AnuncioTemaEstabelecimentoController');

Route::resource('anuncioVideos', 'AnuncioVideosController');

Route::resource('cidades', 'CidadeController');

Route::resource('consumidorHistoricos', 'ConsumidorHistoricoController');

Route::resource('consumidorOpcaoCulinarias', 'ConsumidorOpcaoCulinariaController');

Route::resource('consumidorPalavraChaves', 'ConsumidorPalavraChaveController');

Route::resource('estados', 'EstadoController');

Route::resource('estiloMusicals', 'EstiloMusicalController');

Route::resource('eventos', 'EventoController');

Route::resource('eventoConvidados', 'EventoConvidadosController');

Route::resource('eventoConvites', 'EventoConviteController');

Route::resource('eventoHistoricos', 'EventoHistoricoController');

Route::resource('eventoMesas', 'EventoMesasController');

Route::resource('eventoPalavrasChaves', 'EventoPalavrasChaveController');

Route::resource('eventoPublicoAlvos', 'EventoPublicoAlvoController');

Route::resource('eventoServicos', 'EventoServicoController');

Route::resource('grauEventos', 'GrauEventoController');

Route::resource('grauServicos', 'GrauServicoController');

Route::resource('opcaoCulinarias', 'OpcaoCulinariaController');

Route::resource('orcamentos', 'OrcamentoController');

Route::resource('orcamentoAvulsos', 'OrcamentoAvulsoController');

Route::resource('orcamentoItems', 'OrcamentoItemController');

Route::resource('orcamentoMensagens', 'OrcamentoMensagensController');

Route::resource('paginaEventos', 'PaginaEventoController');

Route::resource('paginaEventoFotos', 'PaginaEventoFotosController');

Route::resource('paginaEventoPosts', 'PaginaEventoPostController');

Route::resource('paginaEventoRecados', 'PaginaEventoRecadoController');

Route::resource('paginaEventoVideos', 'PaginaEventoVideoController');

Route::resource('palavrasChaves', 'PalavrasChaveController');

Route::resource('palavrasChaveNegativas', 'PalavrasChaveNegativasController');

Route::resource('preferenciaSaidas', 'PreferenciaSaidaController');

Route::resource('ramoNegocios', 'RamoNegocioController');

Route::resource('statusAnunciantes', 'StatusAnuncianteController');

Route::resource('statusConsumidors', 'StatusConsumidorController');

Route::resource('statusEventos', 'StatusEventoController');

Route::resource('statusOrcamentos', 'StatusOrcamentoController');

Route::resource('temaEstabelecimentos', 'TemaEstabelecimentoController');

Route::resource('tipoEventos', 'TipoEventoController');
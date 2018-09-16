<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAnuncioAbrangenciaAtuacaoAPIRequest;
use App\Http\Requests\API\UpdateAnuncioAbrangenciaAtuacaoAPIRequest;
use App\Models\AnuncioAbrangenciaAtuacao;
use App\Repositories\AnuncioAbrangenciaAtuacaoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AnuncioAbrangenciaAtuacaoController
 * @package App\Http\Controllers\API
 */

class AnuncioAbrangenciaAtuacaoAPIController extends AppBaseController
{
    /** @var  AnuncioAbrangenciaAtuacaoRepository */
    private $anuncioAbrangenciaAtuacaoRepository;

    public function __construct(AnuncioAbrangenciaAtuacaoRepository $anuncioAbrangenciaAtuacaoRepo)
    {
        $this->anuncioAbrangenciaAtuacaoRepository = $anuncioAbrangenciaAtuacaoRepo;
    }

    /**
     * Display a listing of the AnuncioAbrangenciaAtuacao.
     * GET|HEAD /anuncioAbrangenciaAtuacaos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncioAbrangenciaAtuacaoRepository->pushCriteria(new RequestCriteria($request));
        $this->anuncioAbrangenciaAtuacaoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $anuncioAbrangenciaAtuacaos = $this->anuncioAbrangenciaAtuacaoRepository->all();

        return $this->sendResponse($anuncioAbrangenciaAtuacaos->toArray(), 'Anuncio Abrangencia Atuacaos retrieved successfully');
    }

    /**
     * Store a newly created AnuncioAbrangenciaAtuacao in storage.
     * POST /anuncioAbrangenciaAtuacaos
     *
     * @param CreateAnuncioAbrangenciaAtuacaoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncioAbrangenciaAtuacaoAPIRequest $request)
    {
        $input = $request->all();

        $anuncioAbrangenciaAtuacaos = $this->anuncioAbrangenciaAtuacaoRepository->create($input);

        return $this->sendResponse($anuncioAbrangenciaAtuacaos->toArray(), 'Anuncio Abrangencia Atuacao saved successfully');
    }

    /**
     * Display the specified AnuncioAbrangenciaAtuacao.
     * GET|HEAD /anuncioAbrangenciaAtuacaos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AnuncioAbrangenciaAtuacao $anuncioAbrangenciaAtuacao */
        $anuncioAbrangenciaAtuacao = $this->anuncioAbrangenciaAtuacaoRepository->findWithoutFail($id);

        if (empty($anuncioAbrangenciaAtuacao)) {
            return $this->sendError('Anuncio Abrangencia Atuacao not found');
        }

        return $this->sendResponse($anuncioAbrangenciaAtuacao->toArray(), 'Anuncio Abrangencia Atuacao retrieved successfully');
    }

    /**
     * Update the specified AnuncioAbrangenciaAtuacao in storage.
     * PUT/PATCH /anuncioAbrangenciaAtuacaos/{id}
     *
     * @param  int $id
     * @param UpdateAnuncioAbrangenciaAtuacaoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncioAbrangenciaAtuacaoAPIRequest $request)
    {
        $input = $request->all();

        /** @var AnuncioAbrangenciaAtuacao $anuncioAbrangenciaAtuacao */
        $anuncioAbrangenciaAtuacao = $this->anuncioAbrangenciaAtuacaoRepository->findWithoutFail($id);

        if (empty($anuncioAbrangenciaAtuacao)) {
            return $this->sendError('Anuncio Abrangencia Atuacao not found');
        }

        $anuncioAbrangenciaAtuacao = $this->anuncioAbrangenciaAtuacaoRepository->update($input, $id);

        return $this->sendResponse($anuncioAbrangenciaAtuacao->toArray(), 'AnuncioAbrangenciaAtuacao updated successfully');
    }

    /**
     * Remove the specified AnuncioAbrangenciaAtuacao from storage.
     * DELETE /anuncioAbrangenciaAtuacaos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AnuncioAbrangenciaAtuacao $anuncioAbrangenciaAtuacao */
        $anuncioAbrangenciaAtuacao = $this->anuncioAbrangenciaAtuacaoRepository->findWithoutFail($id);

        if (empty($anuncioAbrangenciaAtuacao)) {
            return $this->sendError('Anuncio Abrangencia Atuacao not found');
        }

        $anuncioAbrangenciaAtuacao->delete();

        return $this->sendResponse($id, 'Anuncio Abrangencia Atuacao deleted successfully');
    }
}

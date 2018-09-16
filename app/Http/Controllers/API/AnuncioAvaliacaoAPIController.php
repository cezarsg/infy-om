<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAnuncioAvaliacaoAPIRequest;
use App\Http\Requests\API\UpdateAnuncioAvaliacaoAPIRequest;
use App\Models\AnuncioAvaliacao;
use App\Repositories\AnuncioAvaliacaoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AnuncioAvaliacaoController
 * @package App\Http\Controllers\API
 */

class AnuncioAvaliacaoAPIController extends AppBaseController
{
    /** @var  AnuncioAvaliacaoRepository */
    private $anuncioAvaliacaoRepository;

    public function __construct(AnuncioAvaliacaoRepository $anuncioAvaliacaoRepo)
    {
        $this->anuncioAvaliacaoRepository = $anuncioAvaliacaoRepo;
    }

    /**
     * Display a listing of the AnuncioAvaliacao.
     * GET|HEAD /anuncioAvaliacaos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncioAvaliacaoRepository->pushCriteria(new RequestCriteria($request));
        $this->anuncioAvaliacaoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $anuncioAvaliacaos = $this->anuncioAvaliacaoRepository->all();

        return $this->sendResponse($anuncioAvaliacaos->toArray(), 'Anuncio Avaliacaos retrieved successfully');
    }

    /**
     * Store a newly created AnuncioAvaliacao in storage.
     * POST /anuncioAvaliacaos
     *
     * @param CreateAnuncioAvaliacaoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncioAvaliacaoAPIRequest $request)
    {
        $input = $request->all();

        $anuncioAvaliacaos = $this->anuncioAvaliacaoRepository->create($input);

        return $this->sendResponse($anuncioAvaliacaos->toArray(), 'Anuncio Avaliacao saved successfully');
    }

    /**
     * Display the specified AnuncioAvaliacao.
     * GET|HEAD /anuncioAvaliacaos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AnuncioAvaliacao $anuncioAvaliacao */
        $anuncioAvaliacao = $this->anuncioAvaliacaoRepository->findWithoutFail($id);

        if (empty($anuncioAvaliacao)) {
            return $this->sendError('Anuncio Avaliacao not found');
        }

        return $this->sendResponse($anuncioAvaliacao->toArray(), 'Anuncio Avaliacao retrieved successfully');
    }

    /**
     * Update the specified AnuncioAvaliacao in storage.
     * PUT/PATCH /anuncioAvaliacaos/{id}
     *
     * @param  int $id
     * @param UpdateAnuncioAvaliacaoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncioAvaliacaoAPIRequest $request)
    {
        $input = $request->all();

        /** @var AnuncioAvaliacao $anuncioAvaliacao */
        $anuncioAvaliacao = $this->anuncioAvaliacaoRepository->findWithoutFail($id);

        if (empty($anuncioAvaliacao)) {
            return $this->sendError('Anuncio Avaliacao not found');
        }

        $anuncioAvaliacao = $this->anuncioAvaliacaoRepository->update($input, $id);

        return $this->sendResponse($anuncioAvaliacao->toArray(), 'AnuncioAvaliacao updated successfully');
    }

    /**
     * Remove the specified AnuncioAvaliacao from storage.
     * DELETE /anuncioAvaliacaos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AnuncioAvaliacao $anuncioAvaliacao */
        $anuncioAvaliacao = $this->anuncioAvaliacaoRepository->findWithoutFail($id);

        if (empty($anuncioAvaliacao)) {
            return $this->sendError('Anuncio Avaliacao not found');
        }

        $anuncioAvaliacao->delete();

        return $this->sendResponse($id, 'Anuncio Avaliacao deleted successfully');
    }
}

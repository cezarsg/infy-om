<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAnuncioTemaEstabelecimentoAPIRequest;
use App\Http\Requests\API\UpdateAnuncioTemaEstabelecimentoAPIRequest;
use App\Models\AnuncioTemaEstabelecimento;
use App\Repositories\AnuncioTemaEstabelecimentoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AnuncioTemaEstabelecimentoController
 * @package App\Http\Controllers\API
 */

class AnuncioTemaEstabelecimentoAPIController extends AppBaseController
{
    /** @var  AnuncioTemaEstabelecimentoRepository */
    private $anuncioTemaEstabelecimentoRepository;

    public function __construct(AnuncioTemaEstabelecimentoRepository $anuncioTemaEstabelecimentoRepo)
    {
        $this->anuncioTemaEstabelecimentoRepository = $anuncioTemaEstabelecimentoRepo;
    }

    /**
     * Display a listing of the AnuncioTemaEstabelecimento.
     * GET|HEAD /anuncioTemaEstabelecimentos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncioTemaEstabelecimentoRepository->pushCriteria(new RequestCriteria($request));
        $this->anuncioTemaEstabelecimentoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $anuncioTemaEstabelecimentos = $this->anuncioTemaEstabelecimentoRepository->all();

        return $this->sendResponse($anuncioTemaEstabelecimentos->toArray(), 'Anuncio Tema Estabelecimentos retrieved successfully');
    }

    /**
     * Store a newly created AnuncioTemaEstabelecimento in storage.
     * POST /anuncioTemaEstabelecimentos
     *
     * @param CreateAnuncioTemaEstabelecimentoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncioTemaEstabelecimentoAPIRequest $request)
    {
        $input = $request->all();

        $anuncioTemaEstabelecimentos = $this->anuncioTemaEstabelecimentoRepository->create($input);

        return $this->sendResponse($anuncioTemaEstabelecimentos->toArray(), 'Anuncio Tema Estabelecimento saved successfully');
    }

    /**
     * Display the specified AnuncioTemaEstabelecimento.
     * GET|HEAD /anuncioTemaEstabelecimentos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AnuncioTemaEstabelecimento $anuncioTemaEstabelecimento */
        $anuncioTemaEstabelecimento = $this->anuncioTemaEstabelecimentoRepository->findWithoutFail($id);

        if (empty($anuncioTemaEstabelecimento)) {
            return $this->sendError('Anuncio Tema Estabelecimento not found');
        }

        return $this->sendResponse($anuncioTemaEstabelecimento->toArray(), 'Anuncio Tema Estabelecimento retrieved successfully');
    }

    /**
     * Update the specified AnuncioTemaEstabelecimento in storage.
     * PUT/PATCH /anuncioTemaEstabelecimentos/{id}
     *
     * @param  int $id
     * @param UpdateAnuncioTemaEstabelecimentoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncioTemaEstabelecimentoAPIRequest $request)
    {
        $input = $request->all();

        /** @var AnuncioTemaEstabelecimento $anuncioTemaEstabelecimento */
        $anuncioTemaEstabelecimento = $this->anuncioTemaEstabelecimentoRepository->findWithoutFail($id);

        if (empty($anuncioTemaEstabelecimento)) {
            return $this->sendError('Anuncio Tema Estabelecimento not found');
        }

        $anuncioTemaEstabelecimento = $this->anuncioTemaEstabelecimentoRepository->update($input, $id);

        return $this->sendResponse($anuncioTemaEstabelecimento->toArray(), 'AnuncioTemaEstabelecimento updated successfully');
    }

    /**
     * Remove the specified AnuncioTemaEstabelecimento from storage.
     * DELETE /anuncioTemaEstabelecimentos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AnuncioTemaEstabelecimento $anuncioTemaEstabelecimento */
        $anuncioTemaEstabelecimento = $this->anuncioTemaEstabelecimentoRepository->findWithoutFail($id);

        if (empty($anuncioTemaEstabelecimento)) {
            return $this->sendError('Anuncio Tema Estabelecimento not found');
        }

        $anuncioTemaEstabelecimento->delete();

        return $this->sendResponse($id, 'Anuncio Tema Estabelecimento deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAnuncioDiaPromocoesAPIRequest;
use App\Http\Requests\API\UpdateAnuncioDiaPromocoesAPIRequest;
use App\Models\AnuncioDiaPromocoes;
use App\Repositories\AnuncioDiaPromocoesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AnuncioDiaPromocoesController
 * @package App\Http\Controllers\API
 */

class AnuncioDiaPromocoesAPIController extends AppBaseController
{
    /** @var  AnuncioDiaPromocoesRepository */
    private $anuncioDiaPromocoesRepository;

    public function __construct(AnuncioDiaPromocoesRepository $anuncioDiaPromocoesRepo)
    {
        $this->anuncioDiaPromocoesRepository = $anuncioDiaPromocoesRepo;
    }

    /**
     * Display a listing of the AnuncioDiaPromocoes.
     * GET|HEAD /anuncioDiaPromocoes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncioDiaPromocoesRepository->pushCriteria(new RequestCriteria($request));
        $this->anuncioDiaPromocoesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $anuncioDiaPromocoes = $this->anuncioDiaPromocoesRepository->all();

        return $this->sendResponse($anuncioDiaPromocoes->toArray(), 'Anuncio Dia Promocoes retrieved successfully');
    }

    /**
     * Store a newly created AnuncioDiaPromocoes in storage.
     * POST /anuncioDiaPromocoes
     *
     * @param CreateAnuncioDiaPromocoesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncioDiaPromocoesAPIRequest $request)
    {
        $input = $request->all();

        $anuncioDiaPromocoes = $this->anuncioDiaPromocoesRepository->create($input);

        return $this->sendResponse($anuncioDiaPromocoes->toArray(), 'Anuncio Dia Promocoes saved successfully');
    }

    /**
     * Display the specified AnuncioDiaPromocoes.
     * GET|HEAD /anuncioDiaPromocoes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AnuncioDiaPromocoes $anuncioDiaPromocoes */
        $anuncioDiaPromocoes = $this->anuncioDiaPromocoesRepository->findWithoutFail($id);

        if (empty($anuncioDiaPromocoes)) {
            return $this->sendError('Anuncio Dia Promocoes not found');
        }

        return $this->sendResponse($anuncioDiaPromocoes->toArray(), 'Anuncio Dia Promocoes retrieved successfully');
    }

    /**
     * Update the specified AnuncioDiaPromocoes in storage.
     * PUT/PATCH /anuncioDiaPromocoes/{id}
     *
     * @param  int $id
     * @param UpdateAnuncioDiaPromocoesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncioDiaPromocoesAPIRequest $request)
    {
        $input = $request->all();

        /** @var AnuncioDiaPromocoes $anuncioDiaPromocoes */
        $anuncioDiaPromocoes = $this->anuncioDiaPromocoesRepository->findWithoutFail($id);

        if (empty($anuncioDiaPromocoes)) {
            return $this->sendError('Anuncio Dia Promocoes not found');
        }

        $anuncioDiaPromocoes = $this->anuncioDiaPromocoesRepository->update($input, $id);

        return $this->sendResponse($anuncioDiaPromocoes->toArray(), 'AnuncioDiaPromocoes updated successfully');
    }

    /**
     * Remove the specified AnuncioDiaPromocoes from storage.
     * DELETE /anuncioDiaPromocoes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AnuncioDiaPromocoes $anuncioDiaPromocoes */
        $anuncioDiaPromocoes = $this->anuncioDiaPromocoesRepository->findWithoutFail($id);

        if (empty($anuncioDiaPromocoes)) {
            return $this->sendError('Anuncio Dia Promocoes not found');
        }

        $anuncioDiaPromocoes->delete();

        return $this->sendResponse($id, 'Anuncio Dia Promocoes deleted successfully');
    }
}

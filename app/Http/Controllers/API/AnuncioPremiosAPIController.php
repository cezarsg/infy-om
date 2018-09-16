<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAnuncioPremiosAPIRequest;
use App\Http\Requests\API\UpdateAnuncioPremiosAPIRequest;
use App\Models\AnuncioPremios;
use App\Repositories\AnuncioPremiosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AnuncioPremiosController
 * @package App\Http\Controllers\API
 */

class AnuncioPremiosAPIController extends AppBaseController
{
    /** @var  AnuncioPremiosRepository */
    private $anuncioPremiosRepository;

    public function __construct(AnuncioPremiosRepository $anuncioPremiosRepo)
    {
        $this->anuncioPremiosRepository = $anuncioPremiosRepo;
    }

    /**
     * Display a listing of the AnuncioPremios.
     * GET|HEAD /anuncioPremios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncioPremiosRepository->pushCriteria(new RequestCriteria($request));
        $this->anuncioPremiosRepository->pushCriteria(new LimitOffsetCriteria($request));
        $anuncioPremios = $this->anuncioPremiosRepository->all();

        return $this->sendResponse($anuncioPremios->toArray(), 'Anuncio Premios retrieved successfully');
    }

    /**
     * Store a newly created AnuncioPremios in storage.
     * POST /anuncioPremios
     *
     * @param CreateAnuncioPremiosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncioPremiosAPIRequest $request)
    {
        $input = $request->all();

        $anuncioPremios = $this->anuncioPremiosRepository->create($input);

        return $this->sendResponse($anuncioPremios->toArray(), 'Anuncio Premios saved successfully');
    }

    /**
     * Display the specified AnuncioPremios.
     * GET|HEAD /anuncioPremios/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AnuncioPremios $anuncioPremios */
        $anuncioPremios = $this->anuncioPremiosRepository->findWithoutFail($id);

        if (empty($anuncioPremios)) {
            return $this->sendError('Anuncio Premios not found');
        }

        return $this->sendResponse($anuncioPremios->toArray(), 'Anuncio Premios retrieved successfully');
    }

    /**
     * Update the specified AnuncioPremios in storage.
     * PUT/PATCH /anuncioPremios/{id}
     *
     * @param  int $id
     * @param UpdateAnuncioPremiosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncioPremiosAPIRequest $request)
    {
        $input = $request->all();

        /** @var AnuncioPremios $anuncioPremios */
        $anuncioPremios = $this->anuncioPremiosRepository->findWithoutFail($id);

        if (empty($anuncioPremios)) {
            return $this->sendError('Anuncio Premios not found');
        }

        $anuncioPremios = $this->anuncioPremiosRepository->update($input, $id);

        return $this->sendResponse($anuncioPremios->toArray(), 'AnuncioPremios updated successfully');
    }

    /**
     * Remove the specified AnuncioPremios from storage.
     * DELETE /anuncioPremios/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AnuncioPremios $anuncioPremios */
        $anuncioPremios = $this->anuncioPremiosRepository->findWithoutFail($id);

        if (empty($anuncioPremios)) {
            return $this->sendError('Anuncio Premios not found');
        }

        $anuncioPremios->delete();

        return $this->sendResponse($id, 'Anuncio Premios deleted successfully');
    }
}

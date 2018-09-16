<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEstiloMusicalAPIRequest;
use App\Http\Requests\API\UpdateEstiloMusicalAPIRequest;
use App\Models\EstiloMusical;
use App\Repositories\EstiloMusicalRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class EstiloMusicalController
 * @package App\Http\Controllers\API
 */

class EstiloMusicalAPIController extends AppBaseController
{
    /** @var  EstiloMusicalRepository */
    private $estiloMusicalRepository;

    public function __construct(EstiloMusicalRepository $estiloMusicalRepo)
    {
        $this->estiloMusicalRepository = $estiloMusicalRepo;
    }

    /**
     * Display a listing of the EstiloMusical.
     * GET|HEAD /estiloMusicals
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->estiloMusicalRepository->pushCriteria(new RequestCriteria($request));
        $this->estiloMusicalRepository->pushCriteria(new LimitOffsetCriteria($request));
        $estiloMusicals = $this->estiloMusicalRepository->all();

        return $this->sendResponse($estiloMusicals->toArray(), 'Estilo Musicals retrieved successfully');
    }

    /**
     * Store a newly created EstiloMusical in storage.
     * POST /estiloMusicals
     *
     * @param CreateEstiloMusicalAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEstiloMusicalAPIRequest $request)
    {
        $input = $request->all();

        $estiloMusicals = $this->estiloMusicalRepository->create($input);

        return $this->sendResponse($estiloMusicals->toArray(), 'Estilo Musical saved successfully');
    }

    /**
     * Display the specified EstiloMusical.
     * GET|HEAD /estiloMusicals/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EstiloMusical $estiloMusical */
        $estiloMusical = $this->estiloMusicalRepository->findWithoutFail($id);

        if (empty($estiloMusical)) {
            return $this->sendError('Estilo Musical not found');
        }

        return $this->sendResponse($estiloMusical->toArray(), 'Estilo Musical retrieved successfully');
    }

    /**
     * Update the specified EstiloMusical in storage.
     * PUT/PATCH /estiloMusicals/{id}
     *
     * @param  int $id
     * @param UpdateEstiloMusicalAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstiloMusicalAPIRequest $request)
    {
        $input = $request->all();

        /** @var EstiloMusical $estiloMusical */
        $estiloMusical = $this->estiloMusicalRepository->findWithoutFail($id);

        if (empty($estiloMusical)) {
            return $this->sendError('Estilo Musical not found');
        }

        $estiloMusical = $this->estiloMusicalRepository->update($input, $id);

        return $this->sendResponse($estiloMusical->toArray(), 'EstiloMusical updated successfully');
    }

    /**
     * Remove the specified EstiloMusical from storage.
     * DELETE /estiloMusicals/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EstiloMusical $estiloMusical */
        $estiloMusical = $this->estiloMusicalRepository->findWithoutFail($id);

        if (empty($estiloMusical)) {
            return $this->sendError('Estilo Musical not found');
        }

        $estiloMusical->delete();

        return $this->sendResponse($id, 'Estilo Musical deleted successfully');
    }
}

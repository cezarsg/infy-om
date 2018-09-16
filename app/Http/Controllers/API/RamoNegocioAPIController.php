<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRamoNegocioAPIRequest;
use App\Http\Requests\API\UpdateRamoNegocioAPIRequest;
use App\Models\RamoNegocio;
use App\Repositories\RamoNegocioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RamoNegocioController
 * @package App\Http\Controllers\API
 */

class RamoNegocioAPIController extends AppBaseController
{
    /** @var  RamoNegocioRepository */
    private $ramoNegocioRepository;

    public function __construct(RamoNegocioRepository $ramoNegocioRepo)
    {
        $this->ramoNegocioRepository = $ramoNegocioRepo;
    }

    /**
     * Display a listing of the RamoNegocio.
     * GET|HEAD /ramoNegocios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ramoNegocioRepository->pushCriteria(new RequestCriteria($request));
        $this->ramoNegocioRepository->pushCriteria(new LimitOffsetCriteria($request));
        $ramoNegocios = $this->ramoNegocioRepository->all();

        return $this->sendResponse($ramoNegocios->toArray(), 'Ramo Negocios retrieved successfully');
    }

    /**
     * Store a newly created RamoNegocio in storage.
     * POST /ramoNegocios
     *
     * @param CreateRamoNegocioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRamoNegocioAPIRequest $request)
    {
        $input = $request->all();

        $ramoNegocios = $this->ramoNegocioRepository->create($input);

        return $this->sendResponse($ramoNegocios->toArray(), 'Ramo Negocio saved successfully');
    }

    /**
     * Display the specified RamoNegocio.
     * GET|HEAD /ramoNegocios/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var RamoNegocio $ramoNegocio */
        $ramoNegocio = $this->ramoNegocioRepository->findWithoutFail($id);

        if (empty($ramoNegocio)) {
            return $this->sendError('Ramo Negocio not found');
        }

        return $this->sendResponse($ramoNegocio->toArray(), 'Ramo Negocio retrieved successfully');
    }

    /**
     * Update the specified RamoNegocio in storage.
     * PUT/PATCH /ramoNegocios/{id}
     *
     * @param  int $id
     * @param UpdateRamoNegocioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRamoNegocioAPIRequest $request)
    {
        $input = $request->all();

        /** @var RamoNegocio $ramoNegocio */
        $ramoNegocio = $this->ramoNegocioRepository->findWithoutFail($id);

        if (empty($ramoNegocio)) {
            return $this->sendError('Ramo Negocio not found');
        }

        $ramoNegocio = $this->ramoNegocioRepository->update($input, $id);

        return $this->sendResponse($ramoNegocio->toArray(), 'RamoNegocio updated successfully');
    }

    /**
     * Remove the specified RamoNegocio from storage.
     * DELETE /ramoNegocios/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var RamoNegocio $ramoNegocio */
        $ramoNegocio = $this->ramoNegocioRepository->findWithoutFail($id);

        if (empty($ramoNegocio)) {
            return $this->sendError('Ramo Negocio not found');
        }

        $ramoNegocio->delete();

        return $this->sendResponse($id, 'Ramo Negocio deleted successfully');
    }
}

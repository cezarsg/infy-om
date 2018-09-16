<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTipoEventoRamoNegocioAPIRequest;
use App\Http\Requests\API\UpdateTipoEventoRamoNegocioAPIRequest;
use App\Models\TipoEventoRamoNegocio;
use App\Repositories\TipoEventoRamoNegocioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TipoEventoRamoNegocioController
 * @package App\Http\Controllers\API
 */

class TipoEventoRamoNegocioAPIController extends AppBaseController
{
    /** @var  TipoEventoRamoNegocioRepository */
    private $tipoEventoRamoNegocioRepository;

    public function __construct(TipoEventoRamoNegocioRepository $tipoEventoRamoNegocioRepo)
    {
        $this->tipoEventoRamoNegocioRepository = $tipoEventoRamoNegocioRepo;
    }

    /**
     * Display a listing of the TipoEventoRamoNegocio.
     * GET|HEAD /tipoEventoRamoNegocios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipoEventoRamoNegocioRepository->pushCriteria(new RequestCriteria($request));
        $this->tipoEventoRamoNegocioRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tipoEventoRamoNegocios = $this->tipoEventoRamoNegocioRepository->all();

        return $this->sendResponse($tipoEventoRamoNegocios->toArray(), 'Tipo Evento Ramo Negocios retrieved successfully');
    }

    /**
     * Store a newly created TipoEventoRamoNegocio in storage.
     * POST /tipoEventoRamoNegocios
     *
     * @param CreateTipoEventoRamoNegocioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoEventoRamoNegocioAPIRequest $request)
    {
        $input = $request->all();

        $tipoEventoRamoNegocios = $this->tipoEventoRamoNegocioRepository->create($input);

        return $this->sendResponse($tipoEventoRamoNegocios->toArray(), 'Tipo Evento Ramo Negocio saved successfully');
    }

    /**
     * Display the specified TipoEventoRamoNegocio.
     * GET|HEAD /tipoEventoRamoNegocios/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TipoEventoRamoNegocio $tipoEventoRamoNegocio */
        $tipoEventoRamoNegocio = $this->tipoEventoRamoNegocioRepository->findWithoutFail($id);

        if (empty($tipoEventoRamoNegocio)) {
            return $this->sendError('Tipo Evento Ramo Negocio not found');
        }

        return $this->sendResponse($tipoEventoRamoNegocio->toArray(), 'Tipo Evento Ramo Negocio retrieved successfully');
    }

    /**
     * Update the specified TipoEventoRamoNegocio in storage.
     * PUT/PATCH /tipoEventoRamoNegocios/{id}
     *
     * @param  int $id
     * @param UpdateTipoEventoRamoNegocioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoEventoRamoNegocioAPIRequest $request)
    {
        $input = $request->all();

        /** @var TipoEventoRamoNegocio $tipoEventoRamoNegocio */
        $tipoEventoRamoNegocio = $this->tipoEventoRamoNegocioRepository->findWithoutFail($id);

        if (empty($tipoEventoRamoNegocio)) {
            return $this->sendError('Tipo Evento Ramo Negocio not found');
        }

        $tipoEventoRamoNegocio = $this->tipoEventoRamoNegocioRepository->update($input, $id);

        return $this->sendResponse($tipoEventoRamoNegocio->toArray(), 'TipoEventoRamoNegocio updated successfully');
    }

    /**
     * Remove the specified TipoEventoRamoNegocio from storage.
     * DELETE /tipoEventoRamoNegocios/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TipoEventoRamoNegocio $tipoEventoRamoNegocio */
        $tipoEventoRamoNegocio = $this->tipoEventoRamoNegocioRepository->findWithoutFail($id);

        if (empty($tipoEventoRamoNegocio)) {
            return $this->sendError('Tipo Evento Ramo Negocio not found');
        }

        $tipoEventoRamoNegocio->delete();

        return $this->sendResponse($id, 'Tipo Evento Ramo Negocio deleted successfully');
    }
}

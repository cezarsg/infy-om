<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateGrauEventoAPIRequest;
use App\Http\Requests\API\UpdateGrauEventoAPIRequest;
use App\Models\GrauEvento;
use App\Repositories\GrauEventoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class GrauEventoController
 * @package App\Http\Controllers\API
 */

class GrauEventoAPIController extends AppBaseController
{
    /** @var  GrauEventoRepository */
    private $grauEventoRepository;

    public function __construct(GrauEventoRepository $grauEventoRepo)
    {
        $this->grauEventoRepository = $grauEventoRepo;
    }

    /**
     * Display a listing of the GrauEvento.
     * GET|HEAD /grauEventos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->grauEventoRepository->pushCriteria(new RequestCriteria($request));
        $this->grauEventoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $grauEventos = $this->grauEventoRepository->all();

        return $this->sendResponse($grauEventos->toArray(), 'Grau Eventos retrieved successfully');
    }

    /**
     * Store a newly created GrauEvento in storage.
     * POST /grauEventos
     *
     * @param CreateGrauEventoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateGrauEventoAPIRequest $request)
    {
        $input = $request->all();

        $grauEventos = $this->grauEventoRepository->create($input);

        return $this->sendResponse($grauEventos->toArray(), 'Grau Evento saved successfully');
    }

    /**
     * Display the specified GrauEvento.
     * GET|HEAD /grauEventos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var GrauEvento $grauEvento */
        $grauEvento = $this->grauEventoRepository->findWithoutFail($id);

        if (empty($grauEvento)) {
            return $this->sendError('Grau Evento not found');
        }

        return $this->sendResponse($grauEvento->toArray(), 'Grau Evento retrieved successfully');
    }

    /**
     * Update the specified GrauEvento in storage.
     * PUT/PATCH /grauEventos/{id}
     *
     * @param  int $id
     * @param UpdateGrauEventoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGrauEventoAPIRequest $request)
    {
        $input = $request->all();

        /** @var GrauEvento $grauEvento */
        $grauEvento = $this->grauEventoRepository->findWithoutFail($id);

        if (empty($grauEvento)) {
            return $this->sendError('Grau Evento not found');
        }

        $grauEvento = $this->grauEventoRepository->update($input, $id);

        return $this->sendResponse($grauEvento->toArray(), 'GrauEvento updated successfully');
    }

    /**
     * Remove the specified GrauEvento from storage.
     * DELETE /grauEventos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var GrauEvento $grauEvento */
        $grauEvento = $this->grauEventoRepository->findWithoutFail($id);

        if (empty($grauEvento)) {
            return $this->sendError('Grau Evento not found');
        }

        $grauEvento->delete();

        return $this->sendResponse($id, 'Grau Evento deleted successfully');
    }
}

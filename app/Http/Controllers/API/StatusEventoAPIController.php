<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStatusEventoAPIRequest;
use App\Http\Requests\API\UpdateStatusEventoAPIRequest;
use App\Models\StatusEvento;
use App\Repositories\StatusEventoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class StatusEventoController
 * @package App\Http\Controllers\API
 */

class StatusEventoAPIController extends AppBaseController
{
    /** @var  StatusEventoRepository */
    private $statusEventoRepository;

    public function __construct(StatusEventoRepository $statusEventoRepo)
    {
        $this->statusEventoRepository = $statusEventoRepo;
    }

    /**
     * Display a listing of the StatusEvento.
     * GET|HEAD /statusEventos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->statusEventoRepository->pushCriteria(new RequestCriteria($request));
        $this->statusEventoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $statusEventos = $this->statusEventoRepository->all();

        return $this->sendResponse($statusEventos->toArray(), 'Status Eventos retrieved successfully');
    }

    /**
     * Store a newly created StatusEvento in storage.
     * POST /statusEventos
     *
     * @param CreateStatusEventoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStatusEventoAPIRequest $request)
    {
        $input = $request->all();

        $statusEventos = $this->statusEventoRepository->create($input);

        return $this->sendResponse($statusEventos->toArray(), 'Status Evento saved successfully');
    }

    /**
     * Display the specified StatusEvento.
     * GET|HEAD /statusEventos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var StatusEvento $statusEvento */
        $statusEvento = $this->statusEventoRepository->findWithoutFail($id);

        if (empty($statusEvento)) {
            return $this->sendError('Status Evento not found');
        }

        return $this->sendResponse($statusEvento->toArray(), 'Status Evento retrieved successfully');
    }

    /**
     * Update the specified StatusEvento in storage.
     * PUT/PATCH /statusEventos/{id}
     *
     * @param  int $id
     * @param UpdateStatusEventoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStatusEventoAPIRequest $request)
    {
        $input = $request->all();

        /** @var StatusEvento $statusEvento */
        $statusEvento = $this->statusEventoRepository->findWithoutFail($id);

        if (empty($statusEvento)) {
            return $this->sendError('Status Evento not found');
        }

        $statusEvento = $this->statusEventoRepository->update($input, $id);

        return $this->sendResponse($statusEvento->toArray(), 'StatusEvento updated successfully');
    }

    /**
     * Remove the specified StatusEvento from storage.
     * DELETE /statusEventos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var StatusEvento $statusEvento */
        $statusEvento = $this->statusEventoRepository->findWithoutFail($id);

        if (empty($statusEvento)) {
            return $this->sendError('Status Evento not found');
        }

        $statusEvento->delete();

        return $this->sendResponse($id, 'Status Evento deleted successfully');
    }
}

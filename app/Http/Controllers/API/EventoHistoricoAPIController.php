<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEventoHistoricoAPIRequest;
use App\Http\Requests\API\UpdateEventoHistoricoAPIRequest;
use App\Models\EventoHistorico;
use App\Repositories\EventoHistoricoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class EventoHistoricoController
 * @package App\Http\Controllers\API
 */

class EventoHistoricoAPIController extends AppBaseController
{
    /** @var  EventoHistoricoRepository */
    private $eventoHistoricoRepository;

    public function __construct(EventoHistoricoRepository $eventoHistoricoRepo)
    {
        $this->eventoHistoricoRepository = $eventoHistoricoRepo;
    }

    /**
     * Display a listing of the EventoHistorico.
     * GET|HEAD /eventoHistoricos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventoHistoricoRepository->pushCriteria(new RequestCriteria($request));
        $this->eventoHistoricoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $eventoHistoricos = $this->eventoHistoricoRepository->all();

        return $this->sendResponse($eventoHistoricos->toArray(), 'Evento Historicos retrieved successfully');
    }

    /**
     * Store a newly created EventoHistorico in storage.
     * POST /eventoHistoricos
     *
     * @param CreateEventoHistoricoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEventoHistoricoAPIRequest $request)
    {
        $input = $request->all();

        $eventoHistoricos = $this->eventoHistoricoRepository->create($input);

        return $this->sendResponse($eventoHistoricos->toArray(), 'Evento Historico saved successfully');
    }

    /**
     * Display the specified EventoHistorico.
     * GET|HEAD /eventoHistoricos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EventoHistorico $eventoHistorico */
        $eventoHistorico = $this->eventoHistoricoRepository->findWithoutFail($id);

        if (empty($eventoHistorico)) {
            return $this->sendError('Evento Historico not found');
        }

        return $this->sendResponse($eventoHistorico->toArray(), 'Evento Historico retrieved successfully');
    }

    /**
     * Update the specified EventoHistorico in storage.
     * PUT/PATCH /eventoHistoricos/{id}
     *
     * @param  int $id
     * @param UpdateEventoHistoricoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventoHistoricoAPIRequest $request)
    {
        $input = $request->all();

        /** @var EventoHistorico $eventoHistorico */
        $eventoHistorico = $this->eventoHistoricoRepository->findWithoutFail($id);

        if (empty($eventoHistorico)) {
            return $this->sendError('Evento Historico not found');
        }

        $eventoHistorico = $this->eventoHistoricoRepository->update($input, $id);

        return $this->sendResponse($eventoHistorico->toArray(), 'EventoHistorico updated successfully');
    }

    /**
     * Remove the specified EventoHistorico from storage.
     * DELETE /eventoHistoricos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EventoHistorico $eventoHistorico */
        $eventoHistorico = $this->eventoHistoricoRepository->findWithoutFail($id);

        if (empty($eventoHistorico)) {
            return $this->sendError('Evento Historico not found');
        }

        $eventoHistorico->delete();

        return $this->sendResponse($id, 'Evento Historico deleted successfully');
    }
}

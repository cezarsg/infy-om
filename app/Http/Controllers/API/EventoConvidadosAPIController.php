<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEventoConvidadosAPIRequest;
use App\Http\Requests\API\UpdateEventoConvidadosAPIRequest;
use App\Models\EventoConvidados;
use App\Repositories\EventoConvidadosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class EventoConvidadosController
 * @package App\Http\Controllers\API
 */

class EventoConvidadosAPIController extends AppBaseController
{
    /** @var  EventoConvidadosRepository */
    private $eventoConvidadosRepository;

    public function __construct(EventoConvidadosRepository $eventoConvidadosRepo)
    {
        $this->eventoConvidadosRepository = $eventoConvidadosRepo;
    }

    /**
     * Display a listing of the EventoConvidados.
     * GET|HEAD /eventoConvidados
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventoConvidadosRepository->pushCriteria(new RequestCriteria($request));
        $this->eventoConvidadosRepository->pushCriteria(new LimitOffsetCriteria($request));
        $eventoConvidados = $this->eventoConvidadosRepository->all();

        return $this->sendResponse($eventoConvidados->toArray(), 'Evento Convidados retrieved successfully');
    }

    /**
     * Store a newly created EventoConvidados in storage.
     * POST /eventoConvidados
     *
     * @param CreateEventoConvidadosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEventoConvidadosAPIRequest $request)
    {
        $input = $request->all();

        $eventoConvidados = $this->eventoConvidadosRepository->create($input);

        return $this->sendResponse($eventoConvidados->toArray(), 'Evento Convidados saved successfully');
    }

    /**
     * Display the specified EventoConvidados.
     * GET|HEAD /eventoConvidados/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EventoConvidados $eventoConvidados */
        $eventoConvidados = $this->eventoConvidadosRepository->findWithoutFail($id);

        if (empty($eventoConvidados)) {
            return $this->sendError('Evento Convidados not found');
        }

        return $this->sendResponse($eventoConvidados->toArray(), 'Evento Convidados retrieved successfully');
    }

    /**
     * Update the specified EventoConvidados in storage.
     * PUT/PATCH /eventoConvidados/{id}
     *
     * @param  int $id
     * @param UpdateEventoConvidadosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventoConvidadosAPIRequest $request)
    {
        $input = $request->all();

        /** @var EventoConvidados $eventoConvidados */
        $eventoConvidados = $this->eventoConvidadosRepository->findWithoutFail($id);

        if (empty($eventoConvidados)) {
            return $this->sendError('Evento Convidados not found');
        }

        $eventoConvidados = $this->eventoConvidadosRepository->update($input, $id);

        return $this->sendResponse($eventoConvidados->toArray(), 'EventoConvidados updated successfully');
    }

    /**
     * Remove the specified EventoConvidados from storage.
     * DELETE /eventoConvidados/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EventoConvidados $eventoConvidados */
        $eventoConvidados = $this->eventoConvidadosRepository->findWithoutFail($id);

        if (empty($eventoConvidados)) {
            return $this->sendError('Evento Convidados not found');
        }

        $eventoConvidados->delete();

        return $this->sendResponse($id, 'Evento Convidados deleted successfully');
    }
}

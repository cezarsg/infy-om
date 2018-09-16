<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEventoMesasAPIRequest;
use App\Http\Requests\API\UpdateEventoMesasAPIRequest;
use App\Models\EventoMesas;
use App\Repositories\EventoMesasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class EventoMesasController
 * @package App\Http\Controllers\API
 */

class EventoMesasAPIController extends AppBaseController
{
    /** @var  EventoMesasRepository */
    private $eventoMesasRepository;

    public function __construct(EventoMesasRepository $eventoMesasRepo)
    {
        $this->eventoMesasRepository = $eventoMesasRepo;
    }

    /**
     * Display a listing of the EventoMesas.
     * GET|HEAD /eventoMesas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventoMesasRepository->pushCriteria(new RequestCriteria($request));
        $this->eventoMesasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $eventoMesas = $this->eventoMesasRepository->all();

        return $this->sendResponse($eventoMesas->toArray(), 'Evento Mesas retrieved successfully');
    }

    /**
     * Store a newly created EventoMesas in storage.
     * POST /eventoMesas
     *
     * @param CreateEventoMesasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEventoMesasAPIRequest $request)
    {
        $input = $request->all();

        $eventoMesas = $this->eventoMesasRepository->create($input);

        return $this->sendResponse($eventoMesas->toArray(), 'Evento Mesas saved successfully');
    }

    /**
     * Display the specified EventoMesas.
     * GET|HEAD /eventoMesas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EventoMesas $eventoMesas */
        $eventoMesas = $this->eventoMesasRepository->findWithoutFail($id);

        if (empty($eventoMesas)) {
            return $this->sendError('Evento Mesas not found');
        }

        return $this->sendResponse($eventoMesas->toArray(), 'Evento Mesas retrieved successfully');
    }

    /**
     * Update the specified EventoMesas in storage.
     * PUT/PATCH /eventoMesas/{id}
     *
     * @param  int $id
     * @param UpdateEventoMesasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventoMesasAPIRequest $request)
    {
        $input = $request->all();

        /** @var EventoMesas $eventoMesas */
        $eventoMesas = $this->eventoMesasRepository->findWithoutFail($id);

        if (empty($eventoMesas)) {
            return $this->sendError('Evento Mesas not found');
        }

        $eventoMesas = $this->eventoMesasRepository->update($input, $id);

        return $this->sendResponse($eventoMesas->toArray(), 'EventoMesas updated successfully');
    }

    /**
     * Remove the specified EventoMesas from storage.
     * DELETE /eventoMesas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EventoMesas $eventoMesas */
        $eventoMesas = $this->eventoMesasRepository->findWithoutFail($id);

        if (empty($eventoMesas)) {
            return $this->sendError('Evento Mesas not found');
        }

        $eventoMesas->delete();

        return $this->sendResponse($id, 'Evento Mesas deleted successfully');
    }
}

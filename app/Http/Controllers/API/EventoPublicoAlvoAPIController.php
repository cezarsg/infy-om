<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEventoPublicoAlvoAPIRequest;
use App\Http\Requests\API\UpdateEventoPublicoAlvoAPIRequest;
use App\Models\EventoPublicoAlvo;
use App\Repositories\EventoPublicoAlvoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class EventoPublicoAlvoController
 * @package App\Http\Controllers\API
 */

class EventoPublicoAlvoAPIController extends AppBaseController
{
    /** @var  EventoPublicoAlvoRepository */
    private $eventoPublicoAlvoRepository;

    public function __construct(EventoPublicoAlvoRepository $eventoPublicoAlvoRepo)
    {
        $this->eventoPublicoAlvoRepository = $eventoPublicoAlvoRepo;
    }

    /**
     * Display a listing of the EventoPublicoAlvo.
     * GET|HEAD /eventoPublicoAlvos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventoPublicoAlvoRepository->pushCriteria(new RequestCriteria($request));
        $this->eventoPublicoAlvoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $eventoPublicoAlvos = $this->eventoPublicoAlvoRepository->all();

        return $this->sendResponse($eventoPublicoAlvos->toArray(), 'Evento Publico Alvos retrieved successfully');
    }

    /**
     * Store a newly created EventoPublicoAlvo in storage.
     * POST /eventoPublicoAlvos
     *
     * @param CreateEventoPublicoAlvoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEventoPublicoAlvoAPIRequest $request)
    {
        $input = $request->all();

        $eventoPublicoAlvos = $this->eventoPublicoAlvoRepository->create($input);

        return $this->sendResponse($eventoPublicoAlvos->toArray(), 'Evento Publico Alvo saved successfully');
    }

    /**
     * Display the specified EventoPublicoAlvo.
     * GET|HEAD /eventoPublicoAlvos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EventoPublicoAlvo $eventoPublicoAlvo */
        $eventoPublicoAlvo = $this->eventoPublicoAlvoRepository->findWithoutFail($id);

        if (empty($eventoPublicoAlvo)) {
            return $this->sendError('Evento Publico Alvo not found');
        }

        return $this->sendResponse($eventoPublicoAlvo->toArray(), 'Evento Publico Alvo retrieved successfully');
    }

    /**
     * Update the specified EventoPublicoAlvo in storage.
     * PUT/PATCH /eventoPublicoAlvos/{id}
     *
     * @param  int $id
     * @param UpdateEventoPublicoAlvoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventoPublicoAlvoAPIRequest $request)
    {
        $input = $request->all();

        /** @var EventoPublicoAlvo $eventoPublicoAlvo */
        $eventoPublicoAlvo = $this->eventoPublicoAlvoRepository->findWithoutFail($id);

        if (empty($eventoPublicoAlvo)) {
            return $this->sendError('Evento Publico Alvo not found');
        }

        $eventoPublicoAlvo = $this->eventoPublicoAlvoRepository->update($input, $id);

        return $this->sendResponse($eventoPublicoAlvo->toArray(), 'EventoPublicoAlvo updated successfully');
    }

    /**
     * Remove the specified EventoPublicoAlvo from storage.
     * DELETE /eventoPublicoAlvos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EventoPublicoAlvo $eventoPublicoAlvo */
        $eventoPublicoAlvo = $this->eventoPublicoAlvoRepository->findWithoutFail($id);

        if (empty($eventoPublicoAlvo)) {
            return $this->sendError('Evento Publico Alvo not found');
        }

        $eventoPublicoAlvo->delete();

        return $this->sendResponse($id, 'Evento Publico Alvo deleted successfully');
    }
}

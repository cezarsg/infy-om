<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEventoConviteAPIRequest;
use App\Http\Requests\API\UpdateEventoConviteAPIRequest;
use App\Models\EventoConvite;
use App\Repositories\EventoConviteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class EventoConviteController
 * @package App\Http\Controllers\API
 */

class EventoConviteAPIController extends AppBaseController
{
    /** @var  EventoConviteRepository */
    private $eventoConviteRepository;

    public function __construct(EventoConviteRepository $eventoConviteRepo)
    {
        $this->eventoConviteRepository = $eventoConviteRepo;
    }

    /**
     * Display a listing of the EventoConvite.
     * GET|HEAD /eventoConvites
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventoConviteRepository->pushCriteria(new RequestCriteria($request));
        $this->eventoConviteRepository->pushCriteria(new LimitOffsetCriteria($request));
        $eventoConvites = $this->eventoConviteRepository->all();

        return $this->sendResponse($eventoConvites->toArray(), 'Evento Convites retrieved successfully');
    }

    /**
     * Store a newly created EventoConvite in storage.
     * POST /eventoConvites
     *
     * @param CreateEventoConviteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEventoConviteAPIRequest $request)
    {
        $input = $request->all();

        $eventoConvites = $this->eventoConviteRepository->create($input);

        return $this->sendResponse($eventoConvites->toArray(), 'Evento Convite saved successfully');
    }

    /**
     * Display the specified EventoConvite.
     * GET|HEAD /eventoConvites/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EventoConvite $eventoConvite */
        $eventoConvite = $this->eventoConviteRepository->findWithoutFail($id);

        if (empty($eventoConvite)) {
            return $this->sendError('Evento Convite not found');
        }

        return $this->sendResponse($eventoConvite->toArray(), 'Evento Convite retrieved successfully');
    }

    /**
     * Update the specified EventoConvite in storage.
     * PUT/PATCH /eventoConvites/{id}
     *
     * @param  int $id
     * @param UpdateEventoConviteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventoConviteAPIRequest $request)
    {
        $input = $request->all();

        /** @var EventoConvite $eventoConvite */
        $eventoConvite = $this->eventoConviteRepository->findWithoutFail($id);

        if (empty($eventoConvite)) {
            return $this->sendError('Evento Convite not found');
        }

        $eventoConvite = $this->eventoConviteRepository->update($input, $id);

        return $this->sendResponse($eventoConvite->toArray(), 'EventoConvite updated successfully');
    }

    /**
     * Remove the specified EventoConvite from storage.
     * DELETE /eventoConvites/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EventoConvite $eventoConvite */
        $eventoConvite = $this->eventoConviteRepository->findWithoutFail($id);

        if (empty($eventoConvite)) {
            return $this->sendError('Evento Convite not found');
        }

        $eventoConvite->delete();

        return $this->sendResponse($id, 'Evento Convite deleted successfully');
    }
}

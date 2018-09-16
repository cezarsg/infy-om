<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEventoServicoAPIRequest;
use App\Http\Requests\API\UpdateEventoServicoAPIRequest;
use App\Models\EventoServico;
use App\Repositories\EventoServicoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class EventoServicoController
 * @package App\Http\Controllers\API
 */

class EventoServicoAPIController extends AppBaseController
{
    /** @var  EventoServicoRepository */
    private $eventoServicoRepository;

    public function __construct(EventoServicoRepository $eventoServicoRepo)
    {
        $this->eventoServicoRepository = $eventoServicoRepo;
    }

    /**
     * Display a listing of the EventoServico.
     * GET|HEAD /eventoServicos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventoServicoRepository->pushCriteria(new RequestCriteria($request));
        $this->eventoServicoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $eventoServicos = $this->eventoServicoRepository->all();

        return $this->sendResponse($eventoServicos->toArray(), 'Evento Servicos retrieved successfully');
    }

    /**
     * Store a newly created EventoServico in storage.
     * POST /eventoServicos
     *
     * @param CreateEventoServicoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEventoServicoAPIRequest $request)
    {
        $input = $request->all();

        $eventoServicos = $this->eventoServicoRepository->create($input);

        return $this->sendResponse($eventoServicos->toArray(), 'Evento Servico saved successfully');
    }

    /**
     * Display the specified EventoServico.
     * GET|HEAD /eventoServicos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EventoServico $eventoServico */
        $eventoServico = $this->eventoServicoRepository->findWithoutFail($id);

        if (empty($eventoServico)) {
            return $this->sendError('Evento Servico not found');
        }

        return $this->sendResponse($eventoServico->toArray(), 'Evento Servico retrieved successfully');
    }

    /**
     * Update the specified EventoServico in storage.
     * PUT/PATCH /eventoServicos/{id}
     *
     * @param  int $id
     * @param UpdateEventoServicoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventoServicoAPIRequest $request)
    {
        $input = $request->all();

        /** @var EventoServico $eventoServico */
        $eventoServico = $this->eventoServicoRepository->findWithoutFail($id);

        if (empty($eventoServico)) {
            return $this->sendError('Evento Servico not found');
        }

        $eventoServico = $this->eventoServicoRepository->update($input, $id);

        return $this->sendResponse($eventoServico->toArray(), 'EventoServico updated successfully');
    }

    /**
     * Remove the specified EventoServico from storage.
     * DELETE /eventoServicos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EventoServico $eventoServico */
        $eventoServico = $this->eventoServicoRepository->findWithoutFail($id);

        if (empty($eventoServico)) {
            return $this->sendError('Evento Servico not found');
        }

        $eventoServico->delete();

        return $this->sendResponse($id, 'Evento Servico deleted successfully');
    }
}

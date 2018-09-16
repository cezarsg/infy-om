<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePaginaEventoAPIRequest;
use App\Http\Requests\API\UpdatePaginaEventoAPIRequest;
use App\Models\PaginaEvento;
use App\Repositories\PaginaEventoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PaginaEventoController
 * @package App\Http\Controllers\API
 */

class PaginaEventoAPIController extends AppBaseController
{
    /** @var  PaginaEventoRepository */
    private $paginaEventoRepository;

    public function __construct(PaginaEventoRepository $paginaEventoRepo)
    {
        $this->paginaEventoRepository = $paginaEventoRepo;
    }

    /**
     * Display a listing of the PaginaEvento.
     * GET|HEAD /paginaEventos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->paginaEventoRepository->pushCriteria(new RequestCriteria($request));
        $this->paginaEventoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $paginaEventos = $this->paginaEventoRepository->all();

        return $this->sendResponse($paginaEventos->toArray(), 'Pagina Eventos retrieved successfully');
    }

    /**
     * Store a newly created PaginaEvento in storage.
     * POST /paginaEventos
     *
     * @param CreatePaginaEventoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePaginaEventoAPIRequest $request)
    {
        $input = $request->all();

        $paginaEventos = $this->paginaEventoRepository->create($input);

        return $this->sendResponse($paginaEventos->toArray(), 'Pagina Evento saved successfully');
    }

    /**
     * Display the specified PaginaEvento.
     * GET|HEAD /paginaEventos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PaginaEvento $paginaEvento */
        $paginaEvento = $this->paginaEventoRepository->findWithoutFail($id);

        if (empty($paginaEvento)) {
            return $this->sendError('Pagina Evento not found');
        }

        return $this->sendResponse($paginaEvento->toArray(), 'Pagina Evento retrieved successfully');
    }

    /**
     * Update the specified PaginaEvento in storage.
     * PUT/PATCH /paginaEventos/{id}
     *
     * @param  int $id
     * @param UpdatePaginaEventoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaginaEventoAPIRequest $request)
    {
        $input = $request->all();

        /** @var PaginaEvento $paginaEvento */
        $paginaEvento = $this->paginaEventoRepository->findWithoutFail($id);

        if (empty($paginaEvento)) {
            return $this->sendError('Pagina Evento not found');
        }

        $paginaEvento = $this->paginaEventoRepository->update($input, $id);

        return $this->sendResponse($paginaEvento->toArray(), 'PaginaEvento updated successfully');
    }

    /**
     * Remove the specified PaginaEvento from storage.
     * DELETE /paginaEventos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PaginaEvento $paginaEvento */
        $paginaEvento = $this->paginaEventoRepository->findWithoutFail($id);

        if (empty($paginaEvento)) {
            return $this->sendError('Pagina Evento not found');
        }

        $paginaEvento->delete();

        return $this->sendResponse($id, 'Pagina Evento deleted successfully');
    }
}

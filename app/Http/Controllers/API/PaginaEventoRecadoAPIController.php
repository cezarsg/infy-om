<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePaginaEventoRecadoAPIRequest;
use App\Http\Requests\API\UpdatePaginaEventoRecadoAPIRequest;
use App\Models\PaginaEventoRecado;
use App\Repositories\PaginaEventoRecadoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PaginaEventoRecadoController
 * @package App\Http\Controllers\API
 */

class PaginaEventoRecadoAPIController extends AppBaseController
{
    /** @var  PaginaEventoRecadoRepository */
    private $paginaEventoRecadoRepository;

    public function __construct(PaginaEventoRecadoRepository $paginaEventoRecadoRepo)
    {
        $this->paginaEventoRecadoRepository = $paginaEventoRecadoRepo;
    }

    /**
     * Display a listing of the PaginaEventoRecado.
     * GET|HEAD /paginaEventoRecados
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->paginaEventoRecadoRepository->pushCriteria(new RequestCriteria($request));
        $this->paginaEventoRecadoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $paginaEventoRecados = $this->paginaEventoRecadoRepository->all();

        return $this->sendResponse($paginaEventoRecados->toArray(), 'Pagina Evento Recados retrieved successfully');
    }

    /**
     * Store a newly created PaginaEventoRecado in storage.
     * POST /paginaEventoRecados
     *
     * @param CreatePaginaEventoRecadoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePaginaEventoRecadoAPIRequest $request)
    {
        $input = $request->all();

        $paginaEventoRecados = $this->paginaEventoRecadoRepository->create($input);

        return $this->sendResponse($paginaEventoRecados->toArray(), 'Pagina Evento Recado saved successfully');
    }

    /**
     * Display the specified PaginaEventoRecado.
     * GET|HEAD /paginaEventoRecados/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PaginaEventoRecado $paginaEventoRecado */
        $paginaEventoRecado = $this->paginaEventoRecadoRepository->findWithoutFail($id);

        if (empty($paginaEventoRecado)) {
            return $this->sendError('Pagina Evento Recado not found');
        }

        return $this->sendResponse($paginaEventoRecado->toArray(), 'Pagina Evento Recado retrieved successfully');
    }

    /**
     * Update the specified PaginaEventoRecado in storage.
     * PUT/PATCH /paginaEventoRecados/{id}
     *
     * @param  int $id
     * @param UpdatePaginaEventoRecadoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaginaEventoRecadoAPIRequest $request)
    {
        $input = $request->all();

        /** @var PaginaEventoRecado $paginaEventoRecado */
        $paginaEventoRecado = $this->paginaEventoRecadoRepository->findWithoutFail($id);

        if (empty($paginaEventoRecado)) {
            return $this->sendError('Pagina Evento Recado not found');
        }

        $paginaEventoRecado = $this->paginaEventoRecadoRepository->update($input, $id);

        return $this->sendResponse($paginaEventoRecado->toArray(), 'PaginaEventoRecado updated successfully');
    }

    /**
     * Remove the specified PaginaEventoRecado from storage.
     * DELETE /paginaEventoRecados/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PaginaEventoRecado $paginaEventoRecado */
        $paginaEventoRecado = $this->paginaEventoRecadoRepository->findWithoutFail($id);

        if (empty($paginaEventoRecado)) {
            return $this->sendError('Pagina Evento Recado not found');
        }

        $paginaEventoRecado->delete();

        return $this->sendResponse($id, 'Pagina Evento Recado deleted successfully');
    }
}

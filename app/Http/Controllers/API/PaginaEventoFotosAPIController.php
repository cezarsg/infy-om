<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePaginaEventoFotosAPIRequest;
use App\Http\Requests\API\UpdatePaginaEventoFotosAPIRequest;
use App\Models\PaginaEventoFotos;
use App\Repositories\PaginaEventoFotosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PaginaEventoFotosController
 * @package App\Http\Controllers\API
 */

class PaginaEventoFotosAPIController extends AppBaseController
{
    /** @var  PaginaEventoFotosRepository */
    private $paginaEventoFotosRepository;

    public function __construct(PaginaEventoFotosRepository $paginaEventoFotosRepo)
    {
        $this->paginaEventoFotosRepository = $paginaEventoFotosRepo;
    }

    /**
     * Display a listing of the PaginaEventoFotos.
     * GET|HEAD /paginaEventoFotos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->paginaEventoFotosRepository->pushCriteria(new RequestCriteria($request));
        $this->paginaEventoFotosRepository->pushCriteria(new LimitOffsetCriteria($request));
        $paginaEventoFotos = $this->paginaEventoFotosRepository->all();

        return $this->sendResponse($paginaEventoFotos->toArray(), 'Pagina Evento Fotos retrieved successfully');
    }

    /**
     * Store a newly created PaginaEventoFotos in storage.
     * POST /paginaEventoFotos
     *
     * @param CreatePaginaEventoFotosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePaginaEventoFotosAPIRequest $request)
    {
        $input = $request->all();

        $paginaEventoFotos = $this->paginaEventoFotosRepository->create($input);

        return $this->sendResponse($paginaEventoFotos->toArray(), 'Pagina Evento Fotos saved successfully');
    }

    /**
     * Display the specified PaginaEventoFotos.
     * GET|HEAD /paginaEventoFotos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PaginaEventoFotos $paginaEventoFotos */
        $paginaEventoFotos = $this->paginaEventoFotosRepository->findWithoutFail($id);

        if (empty($paginaEventoFotos)) {
            return $this->sendError('Pagina Evento Fotos not found');
        }

        return $this->sendResponse($paginaEventoFotos->toArray(), 'Pagina Evento Fotos retrieved successfully');
    }

    /**
     * Update the specified PaginaEventoFotos in storage.
     * PUT/PATCH /paginaEventoFotos/{id}
     *
     * @param  int $id
     * @param UpdatePaginaEventoFotosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaginaEventoFotosAPIRequest $request)
    {
        $input = $request->all();

        /** @var PaginaEventoFotos $paginaEventoFotos */
        $paginaEventoFotos = $this->paginaEventoFotosRepository->findWithoutFail($id);

        if (empty($paginaEventoFotos)) {
            return $this->sendError('Pagina Evento Fotos not found');
        }

        $paginaEventoFotos = $this->paginaEventoFotosRepository->update($input, $id);

        return $this->sendResponse($paginaEventoFotos->toArray(), 'PaginaEventoFotos updated successfully');
    }

    /**
     * Remove the specified PaginaEventoFotos from storage.
     * DELETE /paginaEventoFotos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PaginaEventoFotos $paginaEventoFotos */
        $paginaEventoFotos = $this->paginaEventoFotosRepository->findWithoutFail($id);

        if (empty($paginaEventoFotos)) {
            return $this->sendError('Pagina Evento Fotos not found');
        }

        $paginaEventoFotos->delete();

        return $this->sendResponse($id, 'Pagina Evento Fotos deleted successfully');
    }
}

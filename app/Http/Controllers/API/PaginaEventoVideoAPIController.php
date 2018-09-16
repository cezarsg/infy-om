<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePaginaEventoVideoAPIRequest;
use App\Http\Requests\API\UpdatePaginaEventoVideoAPIRequest;
use App\Models\PaginaEventoVideo;
use App\Repositories\PaginaEventoVideoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PaginaEventoVideoController
 * @package App\Http\Controllers\API
 */

class PaginaEventoVideoAPIController extends AppBaseController
{
    /** @var  PaginaEventoVideoRepository */
    private $paginaEventoVideoRepository;

    public function __construct(PaginaEventoVideoRepository $paginaEventoVideoRepo)
    {
        $this->paginaEventoVideoRepository = $paginaEventoVideoRepo;
    }

    /**
     * Display a listing of the PaginaEventoVideo.
     * GET|HEAD /paginaEventoVideos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->paginaEventoVideoRepository->pushCriteria(new RequestCriteria($request));
        $this->paginaEventoVideoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $paginaEventoVideos = $this->paginaEventoVideoRepository->all();

        return $this->sendResponse($paginaEventoVideos->toArray(), 'Pagina Evento Videos retrieved successfully');
    }

    /**
     * Store a newly created PaginaEventoVideo in storage.
     * POST /paginaEventoVideos
     *
     * @param CreatePaginaEventoVideoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePaginaEventoVideoAPIRequest $request)
    {
        $input = $request->all();

        $paginaEventoVideos = $this->paginaEventoVideoRepository->create($input);

        return $this->sendResponse($paginaEventoVideos->toArray(), 'Pagina Evento Video saved successfully');
    }

    /**
     * Display the specified PaginaEventoVideo.
     * GET|HEAD /paginaEventoVideos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PaginaEventoVideo $paginaEventoVideo */
        $paginaEventoVideo = $this->paginaEventoVideoRepository->findWithoutFail($id);

        if (empty($paginaEventoVideo)) {
            return $this->sendError('Pagina Evento Video not found');
        }

        return $this->sendResponse($paginaEventoVideo->toArray(), 'Pagina Evento Video retrieved successfully');
    }

    /**
     * Update the specified PaginaEventoVideo in storage.
     * PUT/PATCH /paginaEventoVideos/{id}
     *
     * @param  int $id
     * @param UpdatePaginaEventoVideoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaginaEventoVideoAPIRequest $request)
    {
        $input = $request->all();

        /** @var PaginaEventoVideo $paginaEventoVideo */
        $paginaEventoVideo = $this->paginaEventoVideoRepository->findWithoutFail($id);

        if (empty($paginaEventoVideo)) {
            return $this->sendError('Pagina Evento Video not found');
        }

        $paginaEventoVideo = $this->paginaEventoVideoRepository->update($input, $id);

        return $this->sendResponse($paginaEventoVideo->toArray(), 'PaginaEventoVideo updated successfully');
    }

    /**
     * Remove the specified PaginaEventoVideo from storage.
     * DELETE /paginaEventoVideos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PaginaEventoVideo $paginaEventoVideo */
        $paginaEventoVideo = $this->paginaEventoVideoRepository->findWithoutFail($id);

        if (empty($paginaEventoVideo)) {
            return $this->sendError('Pagina Evento Video not found');
        }

        $paginaEventoVideo->delete();

        return $this->sendResponse($id, 'Pagina Evento Video deleted successfully');
    }
}

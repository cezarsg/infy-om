<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePaginaEventoPostAPIRequest;
use App\Http\Requests\API\UpdatePaginaEventoPostAPIRequest;
use App\Models\PaginaEventoPost;
use App\Repositories\PaginaEventoPostRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PaginaEventoPostController
 * @package App\Http\Controllers\API
 */

class PaginaEventoPostAPIController extends AppBaseController
{
    /** @var  PaginaEventoPostRepository */
    private $paginaEventoPostRepository;

    public function __construct(PaginaEventoPostRepository $paginaEventoPostRepo)
    {
        $this->paginaEventoPostRepository = $paginaEventoPostRepo;
    }

    /**
     * Display a listing of the PaginaEventoPost.
     * GET|HEAD /paginaEventoPosts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->paginaEventoPostRepository->pushCriteria(new RequestCriteria($request));
        $this->paginaEventoPostRepository->pushCriteria(new LimitOffsetCriteria($request));
        $paginaEventoPosts = $this->paginaEventoPostRepository->all();

        return $this->sendResponse($paginaEventoPosts->toArray(), 'Pagina Evento Posts retrieved successfully');
    }

    /**
     * Store a newly created PaginaEventoPost in storage.
     * POST /paginaEventoPosts
     *
     * @param CreatePaginaEventoPostAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePaginaEventoPostAPIRequest $request)
    {
        $input = $request->all();

        $paginaEventoPosts = $this->paginaEventoPostRepository->create($input);

        return $this->sendResponse($paginaEventoPosts->toArray(), 'Pagina Evento Post saved successfully');
    }

    /**
     * Display the specified PaginaEventoPost.
     * GET|HEAD /paginaEventoPosts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PaginaEventoPost $paginaEventoPost */
        $paginaEventoPost = $this->paginaEventoPostRepository->findWithoutFail($id);

        if (empty($paginaEventoPost)) {
            return $this->sendError('Pagina Evento Post not found');
        }

        return $this->sendResponse($paginaEventoPost->toArray(), 'Pagina Evento Post retrieved successfully');
    }

    /**
     * Update the specified PaginaEventoPost in storage.
     * PUT/PATCH /paginaEventoPosts/{id}
     *
     * @param  int $id
     * @param UpdatePaginaEventoPostAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaginaEventoPostAPIRequest $request)
    {
        $input = $request->all();

        /** @var PaginaEventoPost $paginaEventoPost */
        $paginaEventoPost = $this->paginaEventoPostRepository->findWithoutFail($id);

        if (empty($paginaEventoPost)) {
            return $this->sendError('Pagina Evento Post not found');
        }

        $paginaEventoPost = $this->paginaEventoPostRepository->update($input, $id);

        return $this->sendResponse($paginaEventoPost->toArray(), 'PaginaEventoPost updated successfully');
    }

    /**
     * Remove the specified PaginaEventoPost from storage.
     * DELETE /paginaEventoPosts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PaginaEventoPost $paginaEventoPost */
        $paginaEventoPost = $this->paginaEventoPostRepository->findWithoutFail($id);

        if (empty($paginaEventoPost)) {
            return $this->sendError('Pagina Evento Post not found');
        }

        $paginaEventoPost->delete();

        return $this->sendResponse($id, 'Pagina Evento Post deleted successfully');
    }
}

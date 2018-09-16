<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAnuncioVideosAPIRequest;
use App\Http\Requests\API\UpdateAnuncioVideosAPIRequest;
use App\Models\AnuncioVideos;
use App\Repositories\AnuncioVideosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AnuncioVideosController
 * @package App\Http\Controllers\API
 */

class AnuncioVideosAPIController extends AppBaseController
{
    /** @var  AnuncioVideosRepository */
    private $anuncioVideosRepository;

    public function __construct(AnuncioVideosRepository $anuncioVideosRepo)
    {
        $this->anuncioVideosRepository = $anuncioVideosRepo;
    }

    /**
     * Display a listing of the AnuncioVideos.
     * GET|HEAD /anuncioVideos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncioVideosRepository->pushCriteria(new RequestCriteria($request));
        $this->anuncioVideosRepository->pushCriteria(new LimitOffsetCriteria($request));
        $anuncioVideos = $this->anuncioVideosRepository->all();

        return $this->sendResponse($anuncioVideos->toArray(), 'Anuncio Videos retrieved successfully');
    }

    /**
     * Store a newly created AnuncioVideos in storage.
     * POST /anuncioVideos
     *
     * @param CreateAnuncioVideosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncioVideosAPIRequest $request)
    {
        $input = $request->all();

        $anuncioVideos = $this->anuncioVideosRepository->create($input);

        return $this->sendResponse($anuncioVideos->toArray(), 'Anuncio Videos saved successfully');
    }

    /**
     * Display the specified AnuncioVideos.
     * GET|HEAD /anuncioVideos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AnuncioVideos $anuncioVideos */
        $anuncioVideos = $this->anuncioVideosRepository->findWithoutFail($id);

        if (empty($anuncioVideos)) {
            return $this->sendError('Anuncio Videos not found');
        }

        return $this->sendResponse($anuncioVideos->toArray(), 'Anuncio Videos retrieved successfully');
    }

    /**
     * Update the specified AnuncioVideos in storage.
     * PUT/PATCH /anuncioVideos/{id}
     *
     * @param  int $id
     * @param UpdateAnuncioVideosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncioVideosAPIRequest $request)
    {
        $input = $request->all();

        /** @var AnuncioVideos $anuncioVideos */
        $anuncioVideos = $this->anuncioVideosRepository->findWithoutFail($id);

        if (empty($anuncioVideos)) {
            return $this->sendError('Anuncio Videos not found');
        }

        $anuncioVideos = $this->anuncioVideosRepository->update($input, $id);

        return $this->sendResponse($anuncioVideos->toArray(), 'AnuncioVideos updated successfully');
    }

    /**
     * Remove the specified AnuncioVideos from storage.
     * DELETE /anuncioVideos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AnuncioVideos $anuncioVideos */
        $anuncioVideos = $this->anuncioVideosRepository->findWithoutFail($id);

        if (empty($anuncioVideos)) {
            return $this->sendError('Anuncio Videos not found');
        }

        $anuncioVideos->delete();

        return $this->sendResponse($id, 'Anuncio Videos deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAnuncioFotosAPIRequest;
use App\Http\Requests\API\UpdateAnuncioFotosAPIRequest;
use App\Models\AnuncioFotos;
use App\Repositories\AnuncioFotosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AnuncioFotosController
 * @package App\Http\Controllers\API
 */

class AnuncioFotosAPIController extends AppBaseController
{
    /** @var  AnuncioFotosRepository */
    private $anuncioFotosRepository;

    public function __construct(AnuncioFotosRepository $anuncioFotosRepo)
    {
        $this->anuncioFotosRepository = $anuncioFotosRepo;
    }

    /**
     * Display a listing of the AnuncioFotos.
     * GET|HEAD /anuncioFotos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncioFotosRepository->pushCriteria(new RequestCriteria($request));
        $this->anuncioFotosRepository->pushCriteria(new LimitOffsetCriteria($request));
        $anuncioFotos = $this->anuncioFotosRepository->all();

        return $this->sendResponse($anuncioFotos->toArray(), 'Anuncio Fotos retrieved successfully');
    }

    /**
     * Store a newly created AnuncioFotos in storage.
     * POST /anuncioFotos
     *
     * @param CreateAnuncioFotosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncioFotosAPIRequest $request)
    {
        $input = $request->all();

        $anuncioFotos = $this->anuncioFotosRepository->create($input);

        return $this->sendResponse($anuncioFotos->toArray(), 'Anuncio Fotos saved successfully');
    }

    /**
     * Display the specified AnuncioFotos.
     * GET|HEAD /anuncioFotos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AnuncioFotos $anuncioFotos */
        $anuncioFotos = $this->anuncioFotosRepository->findWithoutFail($id);

        if (empty($anuncioFotos)) {
            return $this->sendError('Anuncio Fotos not found');
        }

        return $this->sendResponse($anuncioFotos->toArray(), 'Anuncio Fotos retrieved successfully');
    }

    /**
     * Update the specified AnuncioFotos in storage.
     * PUT/PATCH /anuncioFotos/{id}
     *
     * @param  int $id
     * @param UpdateAnuncioFotosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncioFotosAPIRequest $request)
    {
        $input = $request->all();

        /** @var AnuncioFotos $anuncioFotos */
        $anuncioFotos = $this->anuncioFotosRepository->findWithoutFail($id);

        if (empty($anuncioFotos)) {
            return $this->sendError('Anuncio Fotos not found');
        }

        $anuncioFotos = $this->anuncioFotosRepository->update($input, $id);

        return $this->sendResponse($anuncioFotos->toArray(), 'AnuncioFotos updated successfully');
    }

    /**
     * Remove the specified AnuncioFotos from storage.
     * DELETE /anuncioFotos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AnuncioFotos $anuncioFotos */
        $anuncioFotos = $this->anuncioFotosRepository->findWithoutFail($id);

        if (empty($anuncioFotos)) {
            return $this->sendError('Anuncio Fotos not found');
        }

        $anuncioFotos->delete();

        return $this->sendResponse($id, 'Anuncio Fotos deleted successfully');
    }
}

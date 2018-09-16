<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAnuncioPrecoMedioEventoAPIRequest;
use App\Http\Requests\API\UpdateAnuncioPrecoMedioEventoAPIRequest;
use App\Models\AnuncioPrecoMedioEvento;
use App\Repositories\AnuncioPrecoMedioEventoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AnuncioPrecoMedioEventoController
 * @package App\Http\Controllers\API
 */

class AnuncioPrecoMedioEventoAPIController extends AppBaseController
{
    /** @var  AnuncioPrecoMedioEventoRepository */
    private $anuncioPrecoMedioEventoRepository;

    public function __construct(AnuncioPrecoMedioEventoRepository $anuncioPrecoMedioEventoRepo)
    {
        $this->anuncioPrecoMedioEventoRepository = $anuncioPrecoMedioEventoRepo;
    }

    /**
     * Display a listing of the AnuncioPrecoMedioEvento.
     * GET|HEAD /anuncioPrecoMedioEventos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncioPrecoMedioEventoRepository->pushCriteria(new RequestCriteria($request));
        $this->anuncioPrecoMedioEventoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $anuncioPrecoMedioEventos = $this->anuncioPrecoMedioEventoRepository->all();

        return $this->sendResponse($anuncioPrecoMedioEventos->toArray(), 'Anuncio Preco Medio Eventos retrieved successfully');
    }

    /**
     * Store a newly created AnuncioPrecoMedioEvento in storage.
     * POST /anuncioPrecoMedioEventos
     *
     * @param CreateAnuncioPrecoMedioEventoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncioPrecoMedioEventoAPIRequest $request)
    {
        $input = $request->all();

        $anuncioPrecoMedioEventos = $this->anuncioPrecoMedioEventoRepository->create($input);

        return $this->sendResponse($anuncioPrecoMedioEventos->toArray(), 'Anuncio Preco Medio Evento saved successfully');
    }

    /**
     * Display the specified AnuncioPrecoMedioEvento.
     * GET|HEAD /anuncioPrecoMedioEventos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AnuncioPrecoMedioEvento $anuncioPrecoMedioEvento */
        $anuncioPrecoMedioEvento = $this->anuncioPrecoMedioEventoRepository->findWithoutFail($id);

        if (empty($anuncioPrecoMedioEvento)) {
            return $this->sendError('Anuncio Preco Medio Evento not found');
        }

        return $this->sendResponse($anuncioPrecoMedioEvento->toArray(), 'Anuncio Preco Medio Evento retrieved successfully');
    }

    /**
     * Update the specified AnuncioPrecoMedioEvento in storage.
     * PUT/PATCH /anuncioPrecoMedioEventos/{id}
     *
     * @param  int $id
     * @param UpdateAnuncioPrecoMedioEventoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncioPrecoMedioEventoAPIRequest $request)
    {
        $input = $request->all();

        /** @var AnuncioPrecoMedioEvento $anuncioPrecoMedioEvento */
        $anuncioPrecoMedioEvento = $this->anuncioPrecoMedioEventoRepository->findWithoutFail($id);

        if (empty($anuncioPrecoMedioEvento)) {
            return $this->sendError('Anuncio Preco Medio Evento not found');
        }

        $anuncioPrecoMedioEvento = $this->anuncioPrecoMedioEventoRepository->update($input, $id);

        return $this->sendResponse($anuncioPrecoMedioEvento->toArray(), 'AnuncioPrecoMedioEvento updated successfully');
    }

    /**
     * Remove the specified AnuncioPrecoMedioEvento from storage.
     * DELETE /anuncioPrecoMedioEventos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AnuncioPrecoMedioEvento $anuncioPrecoMedioEvento */
        $anuncioPrecoMedioEvento = $this->anuncioPrecoMedioEventoRepository->findWithoutFail($id);

        if (empty($anuncioPrecoMedioEvento)) {
            return $this->sendError('Anuncio Preco Medio Evento not found');
        }

        $anuncioPrecoMedioEvento->delete();

        return $this->sendResponse($id, 'Anuncio Preco Medio Evento deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAnuncioHorarioAtendimentoAPIRequest;
use App\Http\Requests\API\UpdateAnuncioHorarioAtendimentoAPIRequest;
use App\Models\AnuncioHorarioAtendimento;
use App\Repositories\AnuncioHorarioAtendimentoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AnuncioHorarioAtendimentoController
 * @package App\Http\Controllers\API
 */

class AnuncioHorarioAtendimentoAPIController extends AppBaseController
{
    /** @var  AnuncioHorarioAtendimentoRepository */
    private $anuncioHorarioAtendimentoRepository;

    public function __construct(AnuncioHorarioAtendimentoRepository $anuncioHorarioAtendimentoRepo)
    {
        $this->anuncioHorarioAtendimentoRepository = $anuncioHorarioAtendimentoRepo;
    }

    /**
     * Display a listing of the AnuncioHorarioAtendimento.
     * GET|HEAD /anuncioHorarioAtendimentos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncioHorarioAtendimentoRepository->pushCriteria(new RequestCriteria($request));
        $this->anuncioHorarioAtendimentoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $anuncioHorarioAtendimentos = $this->anuncioHorarioAtendimentoRepository->all();

        return $this->sendResponse($anuncioHorarioAtendimentos->toArray(), 'Anuncio Horario Atendimentos retrieved successfully');
    }

    /**
     * Store a newly created AnuncioHorarioAtendimento in storage.
     * POST /anuncioHorarioAtendimentos
     *
     * @param CreateAnuncioHorarioAtendimentoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncioHorarioAtendimentoAPIRequest $request)
    {
        $input = $request->all();

        $anuncioHorarioAtendimentos = $this->anuncioHorarioAtendimentoRepository->create($input);

        return $this->sendResponse($anuncioHorarioAtendimentos->toArray(), 'Anuncio Horario Atendimento saved successfully');
    }

    /**
     * Display the specified AnuncioHorarioAtendimento.
     * GET|HEAD /anuncioHorarioAtendimentos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AnuncioHorarioAtendimento $anuncioHorarioAtendimento */
        $anuncioHorarioAtendimento = $this->anuncioHorarioAtendimentoRepository->findWithoutFail($id);

        if (empty($anuncioHorarioAtendimento)) {
            return $this->sendError('Anuncio Horario Atendimento not found');
        }

        return $this->sendResponse($anuncioHorarioAtendimento->toArray(), 'Anuncio Horario Atendimento retrieved successfully');
    }

    /**
     * Update the specified AnuncioHorarioAtendimento in storage.
     * PUT/PATCH /anuncioHorarioAtendimentos/{id}
     *
     * @param  int $id
     * @param UpdateAnuncioHorarioAtendimentoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncioHorarioAtendimentoAPIRequest $request)
    {
        $input = $request->all();

        /** @var AnuncioHorarioAtendimento $anuncioHorarioAtendimento */
        $anuncioHorarioAtendimento = $this->anuncioHorarioAtendimentoRepository->findWithoutFail($id);

        if (empty($anuncioHorarioAtendimento)) {
            return $this->sendError('Anuncio Horario Atendimento not found');
        }

        $anuncioHorarioAtendimento = $this->anuncioHorarioAtendimentoRepository->update($input, $id);

        return $this->sendResponse($anuncioHorarioAtendimento->toArray(), 'AnuncioHorarioAtendimento updated successfully');
    }

    /**
     * Remove the specified AnuncioHorarioAtendimento from storage.
     * DELETE /anuncioHorarioAtendimentos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AnuncioHorarioAtendimento $anuncioHorarioAtendimento */
        $anuncioHorarioAtendimento = $this->anuncioHorarioAtendimentoRepository->findWithoutFail($id);

        if (empty($anuncioHorarioAtendimento)) {
            return $this->sendError('Anuncio Horario Atendimento not found');
        }

        $anuncioHorarioAtendimento->delete();

        return $this->sendResponse($id, 'Anuncio Horario Atendimento deleted successfully');
    }
}

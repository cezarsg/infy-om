<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTemaEstabelecimentoAPIRequest;
use App\Http\Requests\API\UpdateTemaEstabelecimentoAPIRequest;
use App\Models\TemaEstabelecimento;
use App\Repositories\TemaEstabelecimentoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TemaEstabelecimentoController
 * @package App\Http\Controllers\API
 */

class TemaEstabelecimentoAPIController extends AppBaseController
{
    /** @var  TemaEstabelecimentoRepository */
    private $temaEstabelecimentoRepository;

    public function __construct(TemaEstabelecimentoRepository $temaEstabelecimentoRepo)
    {
        $this->temaEstabelecimentoRepository = $temaEstabelecimentoRepo;
    }

    /**
     * Display a listing of the TemaEstabelecimento.
     * GET|HEAD /temaEstabelecimentos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->temaEstabelecimentoRepository->pushCriteria(new RequestCriteria($request));
        $this->temaEstabelecimentoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $temaEstabelecimentos = $this->temaEstabelecimentoRepository->all();

        return $this->sendResponse($temaEstabelecimentos->toArray(), 'Tema Estabelecimentos retrieved successfully');
    }

    /**
     * Store a newly created TemaEstabelecimento in storage.
     * POST /temaEstabelecimentos
     *
     * @param CreateTemaEstabelecimentoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTemaEstabelecimentoAPIRequest $request)
    {
        $input = $request->all();

        $temaEstabelecimentos = $this->temaEstabelecimentoRepository->create($input);

        return $this->sendResponse($temaEstabelecimentos->toArray(), 'Tema Estabelecimento saved successfully');
    }

    /**
     * Display the specified TemaEstabelecimento.
     * GET|HEAD /temaEstabelecimentos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TemaEstabelecimento $temaEstabelecimento */
        $temaEstabelecimento = $this->temaEstabelecimentoRepository->findWithoutFail($id);

        if (empty($temaEstabelecimento)) {
            return $this->sendError('Tema Estabelecimento not found');
        }

        return $this->sendResponse($temaEstabelecimento->toArray(), 'Tema Estabelecimento retrieved successfully');
    }

    /**
     * Update the specified TemaEstabelecimento in storage.
     * PUT/PATCH /temaEstabelecimentos/{id}
     *
     * @param  int $id
     * @param UpdateTemaEstabelecimentoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTemaEstabelecimentoAPIRequest $request)
    {
        $input = $request->all();

        /** @var TemaEstabelecimento $temaEstabelecimento */
        $temaEstabelecimento = $this->temaEstabelecimentoRepository->findWithoutFail($id);

        if (empty($temaEstabelecimento)) {
            return $this->sendError('Tema Estabelecimento not found');
        }

        $temaEstabelecimento = $this->temaEstabelecimentoRepository->update($input, $id);

        return $this->sendResponse($temaEstabelecimento->toArray(), 'TemaEstabelecimento updated successfully');
    }

    /**
     * Remove the specified TemaEstabelecimento from storage.
     * DELETE /temaEstabelecimentos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TemaEstabelecimento $temaEstabelecimento */
        $temaEstabelecimento = $this->temaEstabelecimentoRepository->findWithoutFail($id);

        if (empty($temaEstabelecimento)) {
            return $this->sendError('Tema Estabelecimento not found');
        }

        $temaEstabelecimento->delete();

        return $this->sendResponse($id, 'Tema Estabelecimento deleted successfully');
    }
}

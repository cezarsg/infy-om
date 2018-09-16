<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOrcamentoAvulsoAPIRequest;
use App\Http\Requests\API\UpdateOrcamentoAvulsoAPIRequest;
use App\Models\OrcamentoAvulso;
use App\Repositories\OrcamentoAvulsoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class OrcamentoAvulsoController
 * @package App\Http\Controllers\API
 */

class OrcamentoAvulsoAPIController extends AppBaseController
{
    /** @var  OrcamentoAvulsoRepository */
    private $orcamentoAvulsoRepository;

    public function __construct(OrcamentoAvulsoRepository $orcamentoAvulsoRepo)
    {
        $this->orcamentoAvulsoRepository = $orcamentoAvulsoRepo;
    }

    /**
     * Display a listing of the OrcamentoAvulso.
     * GET|HEAD /orcamentoAvulsos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->orcamentoAvulsoRepository->pushCriteria(new RequestCriteria($request));
        $this->orcamentoAvulsoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $orcamentoAvulsos = $this->orcamentoAvulsoRepository->all();

        return $this->sendResponse($orcamentoAvulsos->toArray(), 'Orcamento Avulsos retrieved successfully');
    }

    /**
     * Store a newly created OrcamentoAvulso in storage.
     * POST /orcamentoAvulsos
     *
     * @param CreateOrcamentoAvulsoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOrcamentoAvulsoAPIRequest $request)
    {
        $input = $request->all();

        $orcamentoAvulsos = $this->orcamentoAvulsoRepository->create($input);

        return $this->sendResponse($orcamentoAvulsos->toArray(), 'Orcamento Avulso saved successfully');
    }

    /**
     * Display the specified OrcamentoAvulso.
     * GET|HEAD /orcamentoAvulsos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OrcamentoAvulso $orcamentoAvulso */
        $orcamentoAvulso = $this->orcamentoAvulsoRepository->findWithoutFail($id);

        if (empty($orcamentoAvulso)) {
            return $this->sendError('Orcamento Avulso not found');
        }

        return $this->sendResponse($orcamentoAvulso->toArray(), 'Orcamento Avulso retrieved successfully');
    }

    /**
     * Update the specified OrcamentoAvulso in storage.
     * PUT/PATCH /orcamentoAvulsos/{id}
     *
     * @param  int $id
     * @param UpdateOrcamentoAvulsoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrcamentoAvulsoAPIRequest $request)
    {
        $input = $request->all();

        /** @var OrcamentoAvulso $orcamentoAvulso */
        $orcamentoAvulso = $this->orcamentoAvulsoRepository->findWithoutFail($id);

        if (empty($orcamentoAvulso)) {
            return $this->sendError('Orcamento Avulso not found');
        }

        $orcamentoAvulso = $this->orcamentoAvulsoRepository->update($input, $id);

        return $this->sendResponse($orcamentoAvulso->toArray(), 'OrcamentoAvulso updated successfully');
    }

    /**
     * Remove the specified OrcamentoAvulso from storage.
     * DELETE /orcamentoAvulsos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OrcamentoAvulso $orcamentoAvulso */
        $orcamentoAvulso = $this->orcamentoAvulsoRepository->findWithoutFail($id);

        if (empty($orcamentoAvulso)) {
            return $this->sendError('Orcamento Avulso not found');
        }

        $orcamentoAvulso->delete();

        return $this->sendResponse($id, 'Orcamento Avulso deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOrcamentoAPIRequest;
use App\Http\Requests\API\UpdateOrcamentoAPIRequest;
use App\Models\Orcamento;
use App\Repositories\OrcamentoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class OrcamentoController
 * @package App\Http\Controllers\API
 */

class OrcamentoAPIController extends AppBaseController
{
    /** @var  OrcamentoRepository */
    private $orcamentoRepository;

    public function __construct(OrcamentoRepository $orcamentoRepo)
    {
        $this->orcamentoRepository = $orcamentoRepo;
    }

    /**
     * Display a listing of the Orcamento.
     * GET|HEAD /orcamentos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->orcamentoRepository->pushCriteria(new RequestCriteria($request));
        $this->orcamentoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $orcamentos = $this->orcamentoRepository->all();

        return $this->sendResponse($orcamentos->toArray(), 'Orcamentos retrieved successfully');
    }

    /**
     * Store a newly created Orcamento in storage.
     * POST /orcamentos
     *
     * @param CreateOrcamentoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOrcamentoAPIRequest $request)
    {
        $input = $request->all();

        $orcamentos = $this->orcamentoRepository->create($input);

        return $this->sendResponse($orcamentos->toArray(), 'Orcamento saved successfully');
    }

    /**
     * Display the specified Orcamento.
     * GET|HEAD /orcamentos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Orcamento $orcamento */
        $orcamento = $this->orcamentoRepository->findWithoutFail($id);

        if (empty($orcamento)) {
            return $this->sendError('Orcamento not found');
        }

        return $this->sendResponse($orcamento->toArray(), 'Orcamento retrieved successfully');
    }

    /**
     * Update the specified Orcamento in storage.
     * PUT/PATCH /orcamentos/{id}
     *
     * @param  int $id
     * @param UpdateOrcamentoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrcamentoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Orcamento $orcamento */
        $orcamento = $this->orcamentoRepository->findWithoutFail($id);

        if (empty($orcamento)) {
            return $this->sendError('Orcamento not found');
        }

        $orcamento = $this->orcamentoRepository->update($input, $id);

        return $this->sendResponse($orcamento->toArray(), 'Orcamento updated successfully');
    }

    /**
     * Remove the specified Orcamento from storage.
     * DELETE /orcamentos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Orcamento $orcamento */
        $orcamento = $this->orcamentoRepository->findWithoutFail($id);

        if (empty($orcamento)) {
            return $this->sendError('Orcamento not found');
        }

        $orcamento->delete();

        return $this->sendResponse($id, 'Orcamento deleted successfully');
    }
}

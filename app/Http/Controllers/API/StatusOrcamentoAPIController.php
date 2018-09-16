<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStatusOrcamentoAPIRequest;
use App\Http\Requests\API\UpdateStatusOrcamentoAPIRequest;
use App\Models\StatusOrcamento;
use App\Repositories\StatusOrcamentoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class StatusOrcamentoController
 * @package App\Http\Controllers\API
 */

class StatusOrcamentoAPIController extends AppBaseController
{
    /** @var  StatusOrcamentoRepository */
    private $statusOrcamentoRepository;

    public function __construct(StatusOrcamentoRepository $statusOrcamentoRepo)
    {
        $this->statusOrcamentoRepository = $statusOrcamentoRepo;
    }

    /**
     * Display a listing of the StatusOrcamento.
     * GET|HEAD /statusOrcamentos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->statusOrcamentoRepository->pushCriteria(new RequestCriteria($request));
        $this->statusOrcamentoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $statusOrcamentos = $this->statusOrcamentoRepository->all();

        return $this->sendResponse($statusOrcamentos->toArray(), 'Status Orcamentos retrieved successfully');
    }

    /**
     * Store a newly created StatusOrcamento in storage.
     * POST /statusOrcamentos
     *
     * @param CreateStatusOrcamentoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStatusOrcamentoAPIRequest $request)
    {
        $input = $request->all();

        $statusOrcamentos = $this->statusOrcamentoRepository->create($input);

        return $this->sendResponse($statusOrcamentos->toArray(), 'Status Orcamento saved successfully');
    }

    /**
     * Display the specified StatusOrcamento.
     * GET|HEAD /statusOrcamentos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var StatusOrcamento $statusOrcamento */
        $statusOrcamento = $this->statusOrcamentoRepository->findWithoutFail($id);

        if (empty($statusOrcamento)) {
            return $this->sendError('Status Orcamento not found');
        }

        return $this->sendResponse($statusOrcamento->toArray(), 'Status Orcamento retrieved successfully');
    }

    /**
     * Update the specified StatusOrcamento in storage.
     * PUT/PATCH /statusOrcamentos/{id}
     *
     * @param  int $id
     * @param UpdateStatusOrcamentoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStatusOrcamentoAPIRequest $request)
    {
        $input = $request->all();

        /** @var StatusOrcamento $statusOrcamento */
        $statusOrcamento = $this->statusOrcamentoRepository->findWithoutFail($id);

        if (empty($statusOrcamento)) {
            return $this->sendError('Status Orcamento not found');
        }

        $statusOrcamento = $this->statusOrcamentoRepository->update($input, $id);

        return $this->sendResponse($statusOrcamento->toArray(), 'StatusOrcamento updated successfully');
    }

    /**
     * Remove the specified StatusOrcamento from storage.
     * DELETE /statusOrcamentos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var StatusOrcamento $statusOrcamento */
        $statusOrcamento = $this->statusOrcamentoRepository->findWithoutFail($id);

        if (empty($statusOrcamento)) {
            return $this->sendError('Status Orcamento not found');
        }

        $statusOrcamento->delete();

        return $this->sendResponse($id, 'Status Orcamento deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOrcamentoItemAPIRequest;
use App\Http\Requests\API\UpdateOrcamentoItemAPIRequest;
use App\Models\OrcamentoItem;
use App\Repositories\OrcamentoItemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class OrcamentoItemController
 * @package App\Http\Controllers\API
 */

class OrcamentoItemAPIController extends AppBaseController
{
    /** @var  OrcamentoItemRepository */
    private $orcamentoItemRepository;

    public function __construct(OrcamentoItemRepository $orcamentoItemRepo)
    {
        $this->orcamentoItemRepository = $orcamentoItemRepo;
    }

    /**
     * Display a listing of the OrcamentoItem.
     * GET|HEAD /orcamentoItems
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->orcamentoItemRepository->pushCriteria(new RequestCriteria($request));
        $this->orcamentoItemRepository->pushCriteria(new LimitOffsetCriteria($request));
        $orcamentoItems = $this->orcamentoItemRepository->all();

        return $this->sendResponse($orcamentoItems->toArray(), 'Orcamento Items retrieved successfully');
    }

    /**
     * Store a newly created OrcamentoItem in storage.
     * POST /orcamentoItems
     *
     * @param CreateOrcamentoItemAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOrcamentoItemAPIRequest $request)
    {
        $input = $request->all();

        $orcamentoItems = $this->orcamentoItemRepository->create($input);

        return $this->sendResponse($orcamentoItems->toArray(), 'Orcamento Item saved successfully');
    }

    /**
     * Display the specified OrcamentoItem.
     * GET|HEAD /orcamentoItems/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OrcamentoItem $orcamentoItem */
        $orcamentoItem = $this->orcamentoItemRepository->findWithoutFail($id);

        if (empty($orcamentoItem)) {
            return $this->sendError('Orcamento Item not found');
        }

        return $this->sendResponse($orcamentoItem->toArray(), 'Orcamento Item retrieved successfully');
    }

    /**
     * Update the specified OrcamentoItem in storage.
     * PUT/PATCH /orcamentoItems/{id}
     *
     * @param  int $id
     * @param UpdateOrcamentoItemAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrcamentoItemAPIRequest $request)
    {
        $input = $request->all();

        /** @var OrcamentoItem $orcamentoItem */
        $orcamentoItem = $this->orcamentoItemRepository->findWithoutFail($id);

        if (empty($orcamentoItem)) {
            return $this->sendError('Orcamento Item not found');
        }

        $orcamentoItem = $this->orcamentoItemRepository->update($input, $id);

        return $this->sendResponse($orcamentoItem->toArray(), 'OrcamentoItem updated successfully');
    }

    /**
     * Remove the specified OrcamentoItem from storage.
     * DELETE /orcamentoItems/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OrcamentoItem $orcamentoItem */
        $orcamentoItem = $this->orcamentoItemRepository->findWithoutFail($id);

        if (empty($orcamentoItem)) {
            return $this->sendError('Orcamento Item not found');
        }

        $orcamentoItem->delete();

        return $this->sendResponse($id, 'Orcamento Item deleted successfully');
    }
}

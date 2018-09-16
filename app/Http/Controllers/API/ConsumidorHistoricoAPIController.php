<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateConsumidorHistoricoAPIRequest;
use App\Http\Requests\API\UpdateConsumidorHistoricoAPIRequest;
use App\Models\ConsumidorHistorico;
use App\Repositories\ConsumidorHistoricoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ConsumidorHistoricoController
 * @package App\Http\Controllers\API
 */

class ConsumidorHistoricoAPIController extends AppBaseController
{
    /** @var  ConsumidorHistoricoRepository */
    private $consumidorHistoricoRepository;

    public function __construct(ConsumidorHistoricoRepository $consumidorHistoricoRepo)
    {
        $this->consumidorHistoricoRepository = $consumidorHistoricoRepo;
    }

    /**
     * Display a listing of the ConsumidorHistorico.
     * GET|HEAD /consumidorHistoricos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->consumidorHistoricoRepository->pushCriteria(new RequestCriteria($request));
        $this->consumidorHistoricoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $consumidorHistoricos = $this->consumidorHistoricoRepository->all();

        return $this->sendResponse($consumidorHistoricos->toArray(), 'Consumidor Historicos retrieved successfully');
    }

    /**
     * Store a newly created ConsumidorHistorico in storage.
     * POST /consumidorHistoricos
     *
     * @param CreateConsumidorHistoricoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateConsumidorHistoricoAPIRequest $request)
    {
        $input = $request->all();

        $consumidorHistoricos = $this->consumidorHistoricoRepository->create($input);

        return $this->sendResponse($consumidorHistoricos->toArray(), 'Consumidor Historico saved successfully');
    }

    /**
     * Display the specified ConsumidorHistorico.
     * GET|HEAD /consumidorHistoricos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ConsumidorHistorico $consumidorHistorico */
        $consumidorHistorico = $this->consumidorHistoricoRepository->findWithoutFail($id);

        if (empty($consumidorHistorico)) {
            return $this->sendError('Consumidor Historico not found');
        }

        return $this->sendResponse($consumidorHistorico->toArray(), 'Consumidor Historico retrieved successfully');
    }

    /**
     * Update the specified ConsumidorHistorico in storage.
     * PUT/PATCH /consumidorHistoricos/{id}
     *
     * @param  int $id
     * @param UpdateConsumidorHistoricoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConsumidorHistoricoAPIRequest $request)
    {
        $input = $request->all();

        /** @var ConsumidorHistorico $consumidorHistorico */
        $consumidorHistorico = $this->consumidorHistoricoRepository->findWithoutFail($id);

        if (empty($consumidorHistorico)) {
            return $this->sendError('Consumidor Historico not found');
        }

        $consumidorHistorico = $this->consumidorHistoricoRepository->update($input, $id);

        return $this->sendResponse($consumidorHistorico->toArray(), 'ConsumidorHistorico updated successfully');
    }

    /**
     * Remove the specified ConsumidorHistorico from storage.
     * DELETE /consumidorHistoricos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ConsumidorHistorico $consumidorHistorico */
        $consumidorHistorico = $this->consumidorHistoricoRepository->findWithoutFail($id);

        if (empty($consumidorHistorico)) {
            return $this->sendError('Consumidor Historico not found');
        }

        $consumidorHistorico->delete();

        return $this->sendResponse($id, 'Consumidor Historico deleted successfully');
    }
}

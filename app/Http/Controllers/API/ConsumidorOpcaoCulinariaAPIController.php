<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateConsumidorOpcaoCulinariaAPIRequest;
use App\Http\Requests\API\UpdateConsumidorOpcaoCulinariaAPIRequest;
use App\Models\ConsumidorOpcaoCulinaria;
use App\Repositories\ConsumidorOpcaoCulinariaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ConsumidorOpcaoCulinariaController
 * @package App\Http\Controllers\API
 */

class ConsumidorOpcaoCulinariaAPIController extends AppBaseController
{
    /** @var  ConsumidorOpcaoCulinariaRepository */
    private $consumidorOpcaoCulinariaRepository;

    public function __construct(ConsumidorOpcaoCulinariaRepository $consumidorOpcaoCulinariaRepo)
    {
        $this->consumidorOpcaoCulinariaRepository = $consumidorOpcaoCulinariaRepo;
    }

    /**
     * Display a listing of the ConsumidorOpcaoCulinaria.
     * GET|HEAD /consumidorOpcaoCulinarias
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->consumidorOpcaoCulinariaRepository->pushCriteria(new RequestCriteria($request));
        $this->consumidorOpcaoCulinariaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $consumidorOpcaoCulinarias = $this->consumidorOpcaoCulinariaRepository->all();

        return $this->sendResponse($consumidorOpcaoCulinarias->toArray(), 'Consumidor Opcao Culinarias retrieved successfully');
    }

    /**
     * Store a newly created ConsumidorOpcaoCulinaria in storage.
     * POST /consumidorOpcaoCulinarias
     *
     * @param CreateConsumidorOpcaoCulinariaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateConsumidorOpcaoCulinariaAPIRequest $request)
    {
        $input = $request->all();

        $consumidorOpcaoCulinarias = $this->consumidorOpcaoCulinariaRepository->create($input);

        return $this->sendResponse($consumidorOpcaoCulinarias->toArray(), 'Consumidor Opcao Culinaria saved successfully');
    }

    /**
     * Display the specified ConsumidorOpcaoCulinaria.
     * GET|HEAD /consumidorOpcaoCulinarias/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ConsumidorOpcaoCulinaria $consumidorOpcaoCulinaria */
        $consumidorOpcaoCulinaria = $this->consumidorOpcaoCulinariaRepository->findWithoutFail($id);

        if (empty($consumidorOpcaoCulinaria)) {
            return $this->sendError('Consumidor Opcao Culinaria not found');
        }

        return $this->sendResponse($consumidorOpcaoCulinaria->toArray(), 'Consumidor Opcao Culinaria retrieved successfully');
    }

    /**
     * Update the specified ConsumidorOpcaoCulinaria in storage.
     * PUT/PATCH /consumidorOpcaoCulinarias/{id}
     *
     * @param  int $id
     * @param UpdateConsumidorOpcaoCulinariaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConsumidorOpcaoCulinariaAPIRequest $request)
    {
        $input = $request->all();

        /** @var ConsumidorOpcaoCulinaria $consumidorOpcaoCulinaria */
        $consumidorOpcaoCulinaria = $this->consumidorOpcaoCulinariaRepository->findWithoutFail($id);

        if (empty($consumidorOpcaoCulinaria)) {
            return $this->sendError('Consumidor Opcao Culinaria not found');
        }

        $consumidorOpcaoCulinaria = $this->consumidorOpcaoCulinariaRepository->update($input, $id);

        return $this->sendResponse($consumidorOpcaoCulinaria->toArray(), 'ConsumidorOpcaoCulinaria updated successfully');
    }

    /**
     * Remove the specified ConsumidorOpcaoCulinaria from storage.
     * DELETE /consumidorOpcaoCulinarias/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ConsumidorOpcaoCulinaria $consumidorOpcaoCulinaria */
        $consumidorOpcaoCulinaria = $this->consumidorOpcaoCulinariaRepository->findWithoutFail($id);

        if (empty($consumidorOpcaoCulinaria)) {
            return $this->sendError('Consumidor Opcao Culinaria not found');
        }

        $consumidorOpcaoCulinaria->delete();

        return $this->sendResponse($id, 'Consumidor Opcao Culinaria deleted successfully');
    }
}

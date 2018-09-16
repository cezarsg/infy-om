<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateConsumidorPalavraChaveAPIRequest;
use App\Http\Requests\API\UpdateConsumidorPalavraChaveAPIRequest;
use App\Models\ConsumidorPalavraChave;
use App\Repositories\ConsumidorPalavraChaveRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ConsumidorPalavraChaveController
 * @package App\Http\Controllers\API
 */

class ConsumidorPalavraChaveAPIController extends AppBaseController
{
    /** @var  ConsumidorPalavraChaveRepository */
    private $consumidorPalavraChaveRepository;

    public function __construct(ConsumidorPalavraChaveRepository $consumidorPalavraChaveRepo)
    {
        $this->consumidorPalavraChaveRepository = $consumidorPalavraChaveRepo;
    }

    /**
     * Display a listing of the ConsumidorPalavraChave.
     * GET|HEAD /consumidorPalavraChaves
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->consumidorPalavraChaveRepository->pushCriteria(new RequestCriteria($request));
        $this->consumidorPalavraChaveRepository->pushCriteria(new LimitOffsetCriteria($request));
        $consumidorPalavraChaves = $this->consumidorPalavraChaveRepository->all();

        return $this->sendResponse($consumidorPalavraChaves->toArray(), 'Consumidor Palavra Chaves retrieved successfully');
    }

    /**
     * Store a newly created ConsumidorPalavraChave in storage.
     * POST /consumidorPalavraChaves
     *
     * @param CreateConsumidorPalavraChaveAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateConsumidorPalavraChaveAPIRequest $request)
    {
        $input = $request->all();

        $consumidorPalavraChaves = $this->consumidorPalavraChaveRepository->create($input);

        return $this->sendResponse($consumidorPalavraChaves->toArray(), 'Consumidor Palavra Chave saved successfully');
    }

    /**
     * Display the specified ConsumidorPalavraChave.
     * GET|HEAD /consumidorPalavraChaves/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ConsumidorPalavraChave $consumidorPalavraChave */
        $consumidorPalavraChave = $this->consumidorPalavraChaveRepository->findWithoutFail($id);

        if (empty($consumidorPalavraChave)) {
            return $this->sendError('Consumidor Palavra Chave not found');
        }

        return $this->sendResponse($consumidorPalavraChave->toArray(), 'Consumidor Palavra Chave retrieved successfully');
    }

    /**
     * Update the specified ConsumidorPalavraChave in storage.
     * PUT/PATCH /consumidorPalavraChaves/{id}
     *
     * @param  int $id
     * @param UpdateConsumidorPalavraChaveAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConsumidorPalavraChaveAPIRequest $request)
    {
        $input = $request->all();

        /** @var ConsumidorPalavraChave $consumidorPalavraChave */
        $consumidorPalavraChave = $this->consumidorPalavraChaveRepository->findWithoutFail($id);

        if (empty($consumidorPalavraChave)) {
            return $this->sendError('Consumidor Palavra Chave not found');
        }

        $consumidorPalavraChave = $this->consumidorPalavraChaveRepository->update($input, $id);

        return $this->sendResponse($consumidorPalavraChave->toArray(), 'ConsumidorPalavraChave updated successfully');
    }

    /**
     * Remove the specified ConsumidorPalavraChave from storage.
     * DELETE /consumidorPalavraChaves/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ConsumidorPalavraChave $consumidorPalavraChave */
        $consumidorPalavraChave = $this->consumidorPalavraChaveRepository->findWithoutFail($id);

        if (empty($consumidorPalavraChave)) {
            return $this->sendError('Consumidor Palavra Chave not found');
        }

        $consumidorPalavraChave->delete();

        return $this->sendResponse($id, 'Consumidor Palavra Chave deleted successfully');
    }
}

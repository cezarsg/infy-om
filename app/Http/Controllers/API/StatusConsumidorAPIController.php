<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStatusConsumidorAPIRequest;
use App\Http\Requests\API\UpdateStatusConsumidorAPIRequest;
use App\Models\StatusConsumidor;
use App\Repositories\StatusConsumidorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class StatusConsumidorController
 * @package App\Http\Controllers\API
 */

class StatusConsumidorAPIController extends AppBaseController
{
    /** @var  StatusConsumidorRepository */
    private $statusConsumidorRepository;

    public function __construct(StatusConsumidorRepository $statusConsumidorRepo)
    {
        $this->statusConsumidorRepository = $statusConsumidorRepo;
    }

    /**
     * Display a listing of the StatusConsumidor.
     * GET|HEAD /statusConsumidors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->statusConsumidorRepository->pushCriteria(new RequestCriteria($request));
        $this->statusConsumidorRepository->pushCriteria(new LimitOffsetCriteria($request));
        $statusConsumidors = $this->statusConsumidorRepository->all();

        return $this->sendResponse($statusConsumidors->toArray(), 'Status Consumidors retrieved successfully');
    }

    /**
     * Store a newly created StatusConsumidor in storage.
     * POST /statusConsumidors
     *
     * @param CreateStatusConsumidorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStatusConsumidorAPIRequest $request)
    {
        $input = $request->all();

        $statusConsumidors = $this->statusConsumidorRepository->create($input);

        return $this->sendResponse($statusConsumidors->toArray(), 'Status Consumidor saved successfully');
    }

    /**
     * Display the specified StatusConsumidor.
     * GET|HEAD /statusConsumidors/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var StatusConsumidor $statusConsumidor */
        $statusConsumidor = $this->statusConsumidorRepository->findWithoutFail($id);

        if (empty($statusConsumidor)) {
            return $this->sendError('Status Consumidor not found');
        }

        return $this->sendResponse($statusConsumidor->toArray(), 'Status Consumidor retrieved successfully');
    }

    /**
     * Update the specified StatusConsumidor in storage.
     * PUT/PATCH /statusConsumidors/{id}
     *
     * @param  int $id
     * @param UpdateStatusConsumidorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStatusConsumidorAPIRequest $request)
    {
        $input = $request->all();

        /** @var StatusConsumidor $statusConsumidor */
        $statusConsumidor = $this->statusConsumidorRepository->findWithoutFail($id);

        if (empty($statusConsumidor)) {
            return $this->sendError('Status Consumidor not found');
        }

        $statusConsumidor = $this->statusConsumidorRepository->update($input, $id);

        return $this->sendResponse($statusConsumidor->toArray(), 'StatusConsumidor updated successfully');
    }

    /**
     * Remove the specified StatusConsumidor from storage.
     * DELETE /statusConsumidors/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var StatusConsumidor $statusConsumidor */
        $statusConsumidor = $this->statusConsumidorRepository->findWithoutFail($id);

        if (empty($statusConsumidor)) {
            return $this->sendError('Status Consumidor not found');
        }

        $statusConsumidor->delete();

        return $this->sendResponse($id, 'Status Consumidor deleted successfully');
    }
}

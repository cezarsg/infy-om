<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStatusAnuncianteAPIRequest;
use App\Http\Requests\API\UpdateStatusAnuncianteAPIRequest;
use App\Models\StatusAnunciante;
use App\Repositories\StatusAnuncianteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class StatusAnuncianteController
 * @package App\Http\Controllers\API
 */

class StatusAnuncianteAPIController extends AppBaseController
{
    /** @var  StatusAnuncianteRepository */
    private $statusAnuncianteRepository;

    public function __construct(StatusAnuncianteRepository $statusAnuncianteRepo)
    {
        $this->statusAnuncianteRepository = $statusAnuncianteRepo;
    }

    /**
     * Display a listing of the StatusAnunciante.
     * GET|HEAD /statusAnunciantes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->statusAnuncianteRepository->pushCriteria(new RequestCriteria($request));
        $this->statusAnuncianteRepository->pushCriteria(new LimitOffsetCriteria($request));
        $statusAnunciantes = $this->statusAnuncianteRepository->all();

        return $this->sendResponse($statusAnunciantes->toArray(), 'Status Anunciantes retrieved successfully');
    }

    /**
     * Store a newly created StatusAnunciante in storage.
     * POST /statusAnunciantes
     *
     * @param CreateStatusAnuncianteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStatusAnuncianteAPIRequest $request)
    {
        $input = $request->all();

        $statusAnunciantes = $this->statusAnuncianteRepository->create($input);

        return $this->sendResponse($statusAnunciantes->toArray(), 'Status Anunciante saved successfully');
    }

    /**
     * Display the specified StatusAnunciante.
     * GET|HEAD /statusAnunciantes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var StatusAnunciante $statusAnunciante */
        $statusAnunciante = $this->statusAnuncianteRepository->findWithoutFail($id);

        if (empty($statusAnunciante)) {
            return $this->sendError('Status Anunciante not found');
        }

        return $this->sendResponse($statusAnunciante->toArray(), 'Status Anunciante retrieved successfully');
    }

    /**
     * Update the specified StatusAnunciante in storage.
     * PUT/PATCH /statusAnunciantes/{id}
     *
     * @param  int $id
     * @param UpdateStatusAnuncianteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStatusAnuncianteAPIRequest $request)
    {
        $input = $request->all();

        /** @var StatusAnunciante $statusAnunciante */
        $statusAnunciante = $this->statusAnuncianteRepository->findWithoutFail($id);

        if (empty($statusAnunciante)) {
            return $this->sendError('Status Anunciante not found');
        }

        $statusAnunciante = $this->statusAnuncianteRepository->update($input, $id);

        return $this->sendResponse($statusAnunciante->toArray(), 'StatusAnunciante updated successfully');
    }

    /**
     * Remove the specified StatusAnunciante from storage.
     * DELETE /statusAnunciantes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var StatusAnunciante $statusAnunciante */
        $statusAnunciante = $this->statusAnuncianteRepository->findWithoutFail($id);

        if (empty($statusAnunciante)) {
            return $this->sendError('Status Anunciante not found');
        }

        $statusAnunciante->delete();

        return $this->sendResponse($id, 'Status Anunciante deleted successfully');
    }
}

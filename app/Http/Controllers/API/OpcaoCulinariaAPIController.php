<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOpcaoCulinariaAPIRequest;
use App\Http\Requests\API\UpdateOpcaoCulinariaAPIRequest;
use App\Models\OpcaoCulinaria;
use App\Repositories\OpcaoCulinariaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class OpcaoCulinariaController
 * @package App\Http\Controllers\API
 */

class OpcaoCulinariaAPIController extends AppBaseController
{
    /** @var  OpcaoCulinariaRepository */
    private $opcaoCulinariaRepository;

    public function __construct(OpcaoCulinariaRepository $opcaoCulinariaRepo)
    {
        $this->opcaoCulinariaRepository = $opcaoCulinariaRepo;
    }

    /**
     * Display a listing of the OpcaoCulinaria.
     * GET|HEAD /opcaoCulinarias
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->opcaoCulinariaRepository->pushCriteria(new RequestCriteria($request));
        $this->opcaoCulinariaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $opcaoCulinarias = $this->opcaoCulinariaRepository->all();

        return $this->sendResponse($opcaoCulinarias->toArray(), 'Opcao Culinarias retrieved successfully');
    }

    /**
     * Store a newly created OpcaoCulinaria in storage.
     * POST /opcaoCulinarias
     *
     * @param CreateOpcaoCulinariaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOpcaoCulinariaAPIRequest $request)
    {
        $input = $request->all();

        $opcaoCulinarias = $this->opcaoCulinariaRepository->create($input);

        return $this->sendResponse($opcaoCulinarias->toArray(), 'Opcao Culinaria saved successfully');
    }

    /**
     * Display the specified OpcaoCulinaria.
     * GET|HEAD /opcaoCulinarias/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OpcaoCulinaria $opcaoCulinaria */
        $opcaoCulinaria = $this->opcaoCulinariaRepository->findWithoutFail($id);

        if (empty($opcaoCulinaria)) {
            return $this->sendError('Opcao Culinaria not found');
        }

        return $this->sendResponse($opcaoCulinaria->toArray(), 'Opcao Culinaria retrieved successfully');
    }

    /**
     * Update the specified OpcaoCulinaria in storage.
     * PUT/PATCH /opcaoCulinarias/{id}
     *
     * @param  int $id
     * @param UpdateOpcaoCulinariaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOpcaoCulinariaAPIRequest $request)
    {
        $input = $request->all();

        /** @var OpcaoCulinaria $opcaoCulinaria */
        $opcaoCulinaria = $this->opcaoCulinariaRepository->findWithoutFail($id);

        if (empty($opcaoCulinaria)) {
            return $this->sendError('Opcao Culinaria not found');
        }

        $opcaoCulinaria = $this->opcaoCulinariaRepository->update($input, $id);

        return $this->sendResponse($opcaoCulinaria->toArray(), 'OpcaoCulinaria updated successfully');
    }

    /**
     * Remove the specified OpcaoCulinaria from storage.
     * DELETE /opcaoCulinarias/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OpcaoCulinaria $opcaoCulinaria */
        $opcaoCulinaria = $this->opcaoCulinariaRepository->findWithoutFail($id);

        if (empty($opcaoCulinaria)) {
            return $this->sendError('Opcao Culinaria not found');
        }

        $opcaoCulinaria->delete();

        return $this->sendResponse($id, 'Opcao Culinaria deleted successfully');
    }
}

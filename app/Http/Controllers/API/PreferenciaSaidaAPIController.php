<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePreferenciaSaidaAPIRequest;
use App\Http\Requests\API\UpdatePreferenciaSaidaAPIRequest;
use App\Models\PreferenciaSaida;
use App\Repositories\PreferenciaSaidaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PreferenciaSaidaController
 * @package App\Http\Controllers\API
 */

class PreferenciaSaidaAPIController extends AppBaseController
{
    /** @var  PreferenciaSaidaRepository */
    private $preferenciaSaidaRepository;

    public function __construct(PreferenciaSaidaRepository $preferenciaSaidaRepo)
    {
        $this->preferenciaSaidaRepository = $preferenciaSaidaRepo;
    }

    /**
     * Display a listing of the PreferenciaSaida.
     * GET|HEAD /preferenciaSaidas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->preferenciaSaidaRepository->pushCriteria(new RequestCriteria($request));
        $this->preferenciaSaidaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $preferenciaSaidas = $this->preferenciaSaidaRepository->all();

        return $this->sendResponse($preferenciaSaidas->toArray(), 'Preferencia Saidas retrieved successfully');
    }

    /**
     * Store a newly created PreferenciaSaida in storage.
     * POST /preferenciaSaidas
     *
     * @param CreatePreferenciaSaidaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePreferenciaSaidaAPIRequest $request)
    {
        $input = $request->all();

        $preferenciaSaidas = $this->preferenciaSaidaRepository->create($input);

        return $this->sendResponse($preferenciaSaidas->toArray(), 'Preferencia Saida saved successfully');
    }

    /**
     * Display the specified PreferenciaSaida.
     * GET|HEAD /preferenciaSaidas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PreferenciaSaida $preferenciaSaida */
        $preferenciaSaida = $this->preferenciaSaidaRepository->findWithoutFail($id);

        if (empty($preferenciaSaida)) {
            return $this->sendError('Preferencia Saida not found');
        }

        return $this->sendResponse($preferenciaSaida->toArray(), 'Preferencia Saida retrieved successfully');
    }

    /**
     * Update the specified PreferenciaSaida in storage.
     * PUT/PATCH /preferenciaSaidas/{id}
     *
     * @param  int $id
     * @param UpdatePreferenciaSaidaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePreferenciaSaidaAPIRequest $request)
    {
        $input = $request->all();

        /** @var PreferenciaSaida $preferenciaSaida */
        $preferenciaSaida = $this->preferenciaSaidaRepository->findWithoutFail($id);

        if (empty($preferenciaSaida)) {
            return $this->sendError('Preferencia Saida not found');
        }

        $preferenciaSaida = $this->preferenciaSaidaRepository->update($input, $id);

        return $this->sendResponse($preferenciaSaida->toArray(), 'PreferenciaSaida updated successfully');
    }

    /**
     * Remove the specified PreferenciaSaida from storage.
     * DELETE /preferenciaSaidas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PreferenciaSaida $preferenciaSaida */
        $preferenciaSaida = $this->preferenciaSaidaRepository->findWithoutFail($id);

        if (empty($preferenciaSaida)) {
            return $this->sendError('Preferencia Saida not found');
        }

        $preferenciaSaida->delete();

        return $this->sendResponse($id, 'Preferencia Saida deleted successfully');
    }
}

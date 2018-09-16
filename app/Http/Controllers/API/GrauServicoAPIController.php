<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateGrauServicoAPIRequest;
use App\Http\Requests\API\UpdateGrauServicoAPIRequest;
use App\Models\GrauServico;
use App\Repositories\GrauServicoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class GrauServicoController
 * @package App\Http\Controllers\API
 */

class GrauServicoAPIController extends AppBaseController
{
    /** @var  GrauServicoRepository */
    private $grauServicoRepository;

    public function __construct(GrauServicoRepository $grauServicoRepo)
    {
        $this->grauServicoRepository = $grauServicoRepo;
    }

    /**
     * Display a listing of the GrauServico.
     * GET|HEAD /grauServicos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->grauServicoRepository->pushCriteria(new RequestCriteria($request));
        $this->grauServicoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $grauServicos = $this->grauServicoRepository->all();

        return $this->sendResponse($grauServicos->toArray(), 'Grau Servicos retrieved successfully');
    }

    /**
     * Store a newly created GrauServico in storage.
     * POST /grauServicos
     *
     * @param CreateGrauServicoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateGrauServicoAPIRequest $request)
    {
        $input = $request->all();

        $grauServicos = $this->grauServicoRepository->create($input);

        return $this->sendResponse($grauServicos->toArray(), 'Grau Servico saved successfully');
    }

    /**
     * Display the specified GrauServico.
     * GET|HEAD /grauServicos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var GrauServico $grauServico */
        $grauServico = $this->grauServicoRepository->findWithoutFail($id);

        if (empty($grauServico)) {
            return $this->sendError('Grau Servico not found');
        }

        return $this->sendResponse($grauServico->toArray(), 'Grau Servico retrieved successfully');
    }

    /**
     * Update the specified GrauServico in storage.
     * PUT/PATCH /grauServicos/{id}
     *
     * @param  int $id
     * @param UpdateGrauServicoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGrauServicoAPIRequest $request)
    {
        $input = $request->all();

        /** @var GrauServico $grauServico */
        $grauServico = $this->grauServicoRepository->findWithoutFail($id);

        if (empty($grauServico)) {
            return $this->sendError('Grau Servico not found');
        }

        $grauServico = $this->grauServicoRepository->update($input, $id);

        return $this->sendResponse($grauServico->toArray(), 'GrauServico updated successfully');
    }

    /**
     * Remove the specified GrauServico from storage.
     * DELETE /grauServicos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var GrauServico $grauServico */
        $grauServico = $this->grauServicoRepository->findWithoutFail($id);

        if (empty($grauServico)) {
            return $this->sendError('Grau Servico not found');
        }

        $grauServico->delete();

        return $this->sendResponse($id, 'Grau Servico deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOrcamentoMensagensAPIRequest;
use App\Http\Requests\API\UpdateOrcamentoMensagensAPIRequest;
use App\Models\OrcamentoMensagens;
use App\Repositories\OrcamentoMensagensRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class OrcamentoMensagensController
 * @package App\Http\Controllers\API
 */

class OrcamentoMensagensAPIController extends AppBaseController
{
    /** @var  OrcamentoMensagensRepository */
    private $orcamentoMensagensRepository;

    public function __construct(OrcamentoMensagensRepository $orcamentoMensagensRepo)
    {
        $this->orcamentoMensagensRepository = $orcamentoMensagensRepo;
    }

    /**
     * Display a listing of the OrcamentoMensagens.
     * GET|HEAD /orcamentoMensagens
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->orcamentoMensagensRepository->pushCriteria(new RequestCriteria($request));
        $this->orcamentoMensagensRepository->pushCriteria(new LimitOffsetCriteria($request));
        $orcamentoMensagens = $this->orcamentoMensagensRepository->all();

        return $this->sendResponse($orcamentoMensagens->toArray(), 'Orcamento Mensagens retrieved successfully');
    }

    /**
     * Store a newly created OrcamentoMensagens in storage.
     * POST /orcamentoMensagens
     *
     * @param CreateOrcamentoMensagensAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOrcamentoMensagensAPIRequest $request)
    {
        $input = $request->all();

        $orcamentoMensagens = $this->orcamentoMensagensRepository->create($input);

        return $this->sendResponse($orcamentoMensagens->toArray(), 'Orcamento Mensagens saved successfully');
    }

    /**
     * Display the specified OrcamentoMensagens.
     * GET|HEAD /orcamentoMensagens/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OrcamentoMensagens $orcamentoMensagens */
        $orcamentoMensagens = $this->orcamentoMensagensRepository->findWithoutFail($id);

        if (empty($orcamentoMensagens)) {
            return $this->sendError('Orcamento Mensagens not found');
        }

        return $this->sendResponse($orcamentoMensagens->toArray(), 'Orcamento Mensagens retrieved successfully');
    }

    /**
     * Update the specified OrcamentoMensagens in storage.
     * PUT/PATCH /orcamentoMensagens/{id}
     *
     * @param  int $id
     * @param UpdateOrcamentoMensagensAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrcamentoMensagensAPIRequest $request)
    {
        $input = $request->all();

        /** @var OrcamentoMensagens $orcamentoMensagens */
        $orcamentoMensagens = $this->orcamentoMensagensRepository->findWithoutFail($id);

        if (empty($orcamentoMensagens)) {
            return $this->sendError('Orcamento Mensagens not found');
        }

        $orcamentoMensagens = $this->orcamentoMensagensRepository->update($input, $id);

        return $this->sendResponse($orcamentoMensagens->toArray(), 'OrcamentoMensagens updated successfully');
    }

    /**
     * Remove the specified OrcamentoMensagens from storage.
     * DELETE /orcamentoMensagens/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OrcamentoMensagens $orcamentoMensagens */
        $orcamentoMensagens = $this->orcamentoMensagensRepository->findWithoutFail($id);

        if (empty($orcamentoMensagens)) {
            return $this->sendError('Orcamento Mensagens not found');
        }

        $orcamentoMensagens->delete();

        return $this->sendResponse($id, 'Orcamento Mensagens deleted successfully');
    }
}

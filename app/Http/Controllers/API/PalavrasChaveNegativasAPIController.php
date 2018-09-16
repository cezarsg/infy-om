<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePalavrasChaveNegativasAPIRequest;
use App\Http\Requests\API\UpdatePalavrasChaveNegativasAPIRequest;
use App\Models\PalavrasChaveNegativas;
use App\Repositories\PalavrasChaveNegativasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PalavrasChaveNegativasController
 * @package App\Http\Controllers\API
 */

class PalavrasChaveNegativasAPIController extends AppBaseController
{
    /** @var  PalavrasChaveNegativasRepository */
    private $palavrasChaveNegativasRepository;

    public function __construct(PalavrasChaveNegativasRepository $palavrasChaveNegativasRepo)
    {
        $this->palavrasChaveNegativasRepository = $palavrasChaveNegativasRepo;
    }

    /**
     * Display a listing of the PalavrasChaveNegativas.
     * GET|HEAD /palavrasChaveNegativas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->palavrasChaveNegativasRepository->pushCriteria(new RequestCriteria($request));
        $this->palavrasChaveNegativasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $palavrasChaveNegativas = $this->palavrasChaveNegativasRepository->all();

        return $this->sendResponse($palavrasChaveNegativas->toArray(), 'Palavras Chave Negativas retrieved successfully');
    }

    /**
     * Store a newly created PalavrasChaveNegativas in storage.
     * POST /palavrasChaveNegativas
     *
     * @param CreatePalavrasChaveNegativasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePalavrasChaveNegativasAPIRequest $request)
    {
        $input = $request->all();

        $palavrasChaveNegativas = $this->palavrasChaveNegativasRepository->create($input);

        return $this->sendResponse($palavrasChaveNegativas->toArray(), 'Palavras Chave Negativas saved successfully');
    }

    /**
     * Display the specified PalavrasChaveNegativas.
     * GET|HEAD /palavrasChaveNegativas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PalavrasChaveNegativas $palavrasChaveNegativas */
        $palavrasChaveNegativas = $this->palavrasChaveNegativasRepository->findWithoutFail($id);

        if (empty($palavrasChaveNegativas)) {
            return $this->sendError('Palavras Chave Negativas not found');
        }

        return $this->sendResponse($palavrasChaveNegativas->toArray(), 'Palavras Chave Negativas retrieved successfully');
    }

    /**
     * Update the specified PalavrasChaveNegativas in storage.
     * PUT/PATCH /palavrasChaveNegativas/{id}
     *
     * @param  int $id
     * @param UpdatePalavrasChaveNegativasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePalavrasChaveNegativasAPIRequest $request)
    {
        $input = $request->all();

        /** @var PalavrasChaveNegativas $palavrasChaveNegativas */
        $palavrasChaveNegativas = $this->palavrasChaveNegativasRepository->findWithoutFail($id);

        if (empty($palavrasChaveNegativas)) {
            return $this->sendError('Palavras Chave Negativas not found');
        }

        $palavrasChaveNegativas = $this->palavrasChaveNegativasRepository->update($input, $id);

        return $this->sendResponse($palavrasChaveNegativas->toArray(), 'PalavrasChaveNegativas updated successfully');
    }

    /**
     * Remove the specified PalavrasChaveNegativas from storage.
     * DELETE /palavrasChaveNegativas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PalavrasChaveNegativas $palavrasChaveNegativas */
        $palavrasChaveNegativas = $this->palavrasChaveNegativasRepository->findWithoutFail($id);

        if (empty($palavrasChaveNegativas)) {
            return $this->sendError('Palavras Chave Negativas not found');
        }

        $palavrasChaveNegativas->delete();

        return $this->sendResponse($id, 'Palavras Chave Negativas deleted successfully');
    }
}

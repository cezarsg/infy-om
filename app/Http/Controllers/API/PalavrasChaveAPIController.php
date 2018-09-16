<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePalavrasChaveAPIRequest;
use App\Http\Requests\API\UpdatePalavrasChaveAPIRequest;
use App\Models\PalavrasChave;
use App\Repositories\PalavrasChaveRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PalavrasChaveController
 * @package App\Http\Controllers\API
 */

class PalavrasChaveAPIController extends AppBaseController
{
    /** @var  PalavrasChaveRepository */
    private $palavrasChaveRepository;

    public function __construct(PalavrasChaveRepository $palavrasChaveRepo)
    {
        $this->palavrasChaveRepository = $palavrasChaveRepo;
    }

    /**
     * Display a listing of the PalavrasChave.
     * GET|HEAD /palavrasChaves
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->palavrasChaveRepository->pushCriteria(new RequestCriteria($request));
        $this->palavrasChaveRepository->pushCriteria(new LimitOffsetCriteria($request));
        $palavrasChaves = $this->palavrasChaveRepository->all();

        return $this->sendResponse($palavrasChaves->toArray(), 'Palavras Chaves retrieved successfully');
    }

    /**
     * Store a newly created PalavrasChave in storage.
     * POST /palavrasChaves
     *
     * @param CreatePalavrasChaveAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePalavrasChaveAPIRequest $request)
    {
        $input = $request->all();

        $palavrasChaves = $this->palavrasChaveRepository->create($input);

        return $this->sendResponse($palavrasChaves->toArray(), 'Palavras Chave saved successfully');
    }

    /**
     * Display the specified PalavrasChave.
     * GET|HEAD /palavrasChaves/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PalavrasChave $palavrasChave */
        $palavrasChave = $this->palavrasChaveRepository->findWithoutFail($id);

        if (empty($palavrasChave)) {
            return $this->sendError('Palavras Chave not found');
        }

        return $this->sendResponse($palavrasChave->toArray(), 'Palavras Chave retrieved successfully');
    }

    /**
     * Update the specified PalavrasChave in storage.
     * PUT/PATCH /palavrasChaves/{id}
     *
     * @param  int $id
     * @param UpdatePalavrasChaveAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePalavrasChaveAPIRequest $request)
    {
        $input = $request->all();

        /** @var PalavrasChave $palavrasChave */
        $palavrasChave = $this->palavrasChaveRepository->findWithoutFail($id);

        if (empty($palavrasChave)) {
            return $this->sendError('Palavras Chave not found');
        }

        $palavrasChave = $this->palavrasChaveRepository->update($input, $id);

        return $this->sendResponse($palavrasChave->toArray(), 'PalavrasChave updated successfully');
    }

    /**
     * Remove the specified PalavrasChave from storage.
     * DELETE /palavrasChaves/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PalavrasChave $palavrasChave */
        $palavrasChave = $this->palavrasChaveRepository->findWithoutFail($id);

        if (empty($palavrasChave)) {
            return $this->sendError('Palavras Chave not found');
        }

        $palavrasChave->delete();

        return $this->sendResponse($id, 'Palavras Chave deleted successfully');
    }
}

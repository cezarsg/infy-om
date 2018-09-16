<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEventoPalavrasChaveAPIRequest;
use App\Http\Requests\API\UpdateEventoPalavrasChaveAPIRequest;
use App\Models\EventoPalavrasChave;
use App\Repositories\EventoPalavrasChaveRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class EventoPalavrasChaveController
 * @package App\Http\Controllers\API
 */

class EventoPalavrasChaveAPIController extends AppBaseController
{
    /** @var  EventoPalavrasChaveRepository */
    private $eventoPalavrasChaveRepository;

    public function __construct(EventoPalavrasChaveRepository $eventoPalavrasChaveRepo)
    {
        $this->eventoPalavrasChaveRepository = $eventoPalavrasChaveRepo;
    }

    /**
     * Display a listing of the EventoPalavrasChave.
     * GET|HEAD /eventoPalavrasChaves
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventoPalavrasChaveRepository->pushCriteria(new RequestCriteria($request));
        $this->eventoPalavrasChaveRepository->pushCriteria(new LimitOffsetCriteria($request));
        $eventoPalavrasChaves = $this->eventoPalavrasChaveRepository->all();

        return $this->sendResponse($eventoPalavrasChaves->toArray(), 'Evento Palavras Chaves retrieved successfully');
    }

    /**
     * Store a newly created EventoPalavrasChave in storage.
     * POST /eventoPalavrasChaves
     *
     * @param CreateEventoPalavrasChaveAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEventoPalavrasChaveAPIRequest $request)
    {
        $input = $request->all();

        $eventoPalavrasChaves = $this->eventoPalavrasChaveRepository->create($input);

        return $this->sendResponse($eventoPalavrasChaves->toArray(), 'Evento Palavras Chave saved successfully');
    }

    /**
     * Display the specified EventoPalavrasChave.
     * GET|HEAD /eventoPalavrasChaves/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EventoPalavrasChave $eventoPalavrasChave */
        $eventoPalavrasChave = $this->eventoPalavrasChaveRepository->findWithoutFail($id);

        if (empty($eventoPalavrasChave)) {
            return $this->sendError('Evento Palavras Chave not found');
        }

        return $this->sendResponse($eventoPalavrasChave->toArray(), 'Evento Palavras Chave retrieved successfully');
    }

    /**
     * Update the specified EventoPalavrasChave in storage.
     * PUT/PATCH /eventoPalavrasChaves/{id}
     *
     * @param  int $id
     * @param UpdateEventoPalavrasChaveAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventoPalavrasChaveAPIRequest $request)
    {
        $input = $request->all();

        /** @var EventoPalavrasChave $eventoPalavrasChave */
        $eventoPalavrasChave = $this->eventoPalavrasChaveRepository->findWithoutFail($id);

        if (empty($eventoPalavrasChave)) {
            return $this->sendError('Evento Palavras Chave not found');
        }

        $eventoPalavrasChave = $this->eventoPalavrasChaveRepository->update($input, $id);

        return $this->sendResponse($eventoPalavrasChave->toArray(), 'EventoPalavrasChave updated successfully');
    }

    /**
     * Remove the specified EventoPalavrasChave from storage.
     * DELETE /eventoPalavrasChaves/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EventoPalavrasChave $eventoPalavrasChave */
        $eventoPalavrasChave = $this->eventoPalavrasChaveRepository->findWithoutFail($id);

        if (empty($eventoPalavrasChave)) {
            return $this->sendError('Evento Palavras Chave not found');
        }

        $eventoPalavrasChave->delete();

        return $this->sendResponse($id, 'Evento Palavras Chave deleted successfully');
    }
}

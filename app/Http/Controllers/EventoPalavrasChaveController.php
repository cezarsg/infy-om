<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventoPalavrasChaveRequest;
use App\Http\Requests\UpdateEventoPalavrasChaveRequest;
use App\Repositories\EventoPalavrasChaveRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EventoPalavrasChaveController extends AppBaseController
{
    /** @var  EventoPalavrasChaveRepository */
    private $eventoPalavrasChaveRepository;

    public function __construct(EventoPalavrasChaveRepository $eventoPalavrasChaveRepo)
    {
        $this->eventoPalavrasChaveRepository = $eventoPalavrasChaveRepo;
    }

    /**
     * Display a listing of the EventoPalavrasChave.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventoPalavrasChaveRepository->pushCriteria(new RequestCriteria($request));
        $eventoPalavrasChaves = $this->eventoPalavrasChaveRepository->paginate(10);

        return view('evento_palavras_chaves.index')
            ->with('eventoPalavrasChaves', $eventoPalavrasChaves);
    }

    /**
     * Show the form for creating a new EventoPalavrasChave.
     *
     * @return Response
     */
    public function create()
    {
        return view('evento_palavras_chaves.create');
    }

    /**
     * Store a newly created EventoPalavrasChave in storage.
     *
     * @param CreateEventoPalavrasChaveRequest $request
     *
     * @return Response
     */
    public function store(CreateEventoPalavrasChaveRequest $request)
    {
        $input = $request->all();

        $eventoPalavrasChave = $this->eventoPalavrasChaveRepository->create($input);

        Flash::success('Evento Palavras Chave saved successfully.');

        return redirect(route('eventoPalavrasChaves.index'));
    }

    /**
     * Display the specified EventoPalavrasChave.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eventoPalavrasChave = $this->eventoPalavrasChaveRepository->findWithoutFail($id);

        if (empty($eventoPalavrasChave)) {
            Flash::error('Evento Palavras Chave not found');

            return redirect(route('eventoPalavrasChaves.index'));
        }

        return view('evento_palavras_chaves.show')->with('eventoPalavrasChave', $eventoPalavrasChave);
    }

    /**
     * Show the form for editing the specified EventoPalavrasChave.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eventoPalavrasChave = $this->eventoPalavrasChaveRepository->findWithoutFail($id);

        if (empty($eventoPalavrasChave)) {
            Flash::error('Evento Palavras Chave not found');

            return redirect(route('eventoPalavrasChaves.index'));
        }

        return view('evento_palavras_chaves.edit')->with('eventoPalavrasChave', $eventoPalavrasChave);
    }

    /**
     * Update the specified EventoPalavrasChave in storage.
     *
     * @param  int              $id
     * @param UpdateEventoPalavrasChaveRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventoPalavrasChaveRequest $request)
    {
        $eventoPalavrasChave = $this->eventoPalavrasChaveRepository->findWithoutFail($id);

        if (empty($eventoPalavrasChave)) {
            Flash::error('Evento Palavras Chave not found');

            return redirect(route('eventoPalavrasChaves.index'));
        }

        $eventoPalavrasChave = $this->eventoPalavrasChaveRepository->update($request->all(), $id);

        Flash::success('Evento Palavras Chave updated successfully.');

        return redirect(route('eventoPalavrasChaves.index'));
    }

    /**
     * Remove the specified EventoPalavrasChave from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eventoPalavrasChave = $this->eventoPalavrasChaveRepository->findWithoutFail($id);

        if (empty($eventoPalavrasChave)) {
            Flash::error('Evento Palavras Chave not found');

            return redirect(route('eventoPalavrasChaves.index'));
        }

        $this->eventoPalavrasChaveRepository->delete($id);

        Flash::success('Evento Palavras Chave deleted successfully.');

        return redirect(route('eventoPalavrasChaves.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventoConviteRequest;
use App\Http\Requests\UpdateEventoConviteRequest;
use App\Repositories\EventoConviteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EventoConviteController extends AppBaseController
{
    /** @var  EventoConviteRepository */
    private $eventoConviteRepository;

    public function __construct(EventoConviteRepository $eventoConviteRepo)
    {
        $this->eventoConviteRepository = $eventoConviteRepo;
    }

    /**
     * Display a listing of the EventoConvite.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventoConviteRepository->pushCriteria(new RequestCriteria($request));
        $eventoConvites = $this->eventoConviteRepository->paginate(10);

        return view('evento_convites.index')
            ->with('eventoConvites', $eventoConvites);
    }

    /**
     * Show the form for creating a new EventoConvite.
     *
     * @return Response
     */
    public function create()
    {
        return view('evento_convites.create');
    }

    /**
     * Store a newly created EventoConvite in storage.
     *
     * @param CreateEventoConviteRequest $request
     *
     * @return Response
     */
    public function store(CreateEventoConviteRequest $request)
    {
        $input = $request->all();

        $eventoConvite = $this->eventoConviteRepository->create($input);

        Flash::success('Evento Convite saved successfully.');

        return redirect(route('eventoConvites.index'));
    }

    /**
     * Display the specified EventoConvite.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eventoConvite = $this->eventoConviteRepository->findWithoutFail($id);

        if (empty($eventoConvite)) {
            Flash::error('Evento Convite not found');

            return redirect(route('eventoConvites.index'));
        }

        return view('evento_convites.show')->with('eventoConvite', $eventoConvite);
    }

    /**
     * Show the form for editing the specified EventoConvite.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eventoConvite = $this->eventoConviteRepository->findWithoutFail($id);

        if (empty($eventoConvite)) {
            Flash::error('Evento Convite not found');

            return redirect(route('eventoConvites.index'));
        }

        return view('evento_convites.edit')->with('eventoConvite', $eventoConvite);
    }

    /**
     * Update the specified EventoConvite in storage.
     *
     * @param  int              $id
     * @param UpdateEventoConviteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventoConviteRequest $request)
    {
        $eventoConvite = $this->eventoConviteRepository->findWithoutFail($id);

        if (empty($eventoConvite)) {
            Flash::error('Evento Convite not found');

            return redirect(route('eventoConvites.index'));
        }

        $eventoConvite = $this->eventoConviteRepository->update($request->all(), $id);

        Flash::success('Evento Convite updated successfully.');

        return redirect(route('eventoConvites.index'));
    }

    /**
     * Remove the specified EventoConvite from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eventoConvite = $this->eventoConviteRepository->findWithoutFail($id);

        if (empty($eventoConvite)) {
            Flash::error('Evento Convite not found');

            return redirect(route('eventoConvites.index'));
        }

        $this->eventoConviteRepository->delete($id);

        Flash::success('Evento Convite deleted successfully.');

        return redirect(route('eventoConvites.index'));
    }
}

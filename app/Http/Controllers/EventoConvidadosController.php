<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventoConvidadosRequest;
use App\Http\Requests\UpdateEventoConvidadosRequest;
use App\Repositories\EventoConvidadosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EventoConvidadosController extends AppBaseController
{
    /** @var  EventoConvidadosRepository */
    private $eventoConvidadosRepository;

    public function __construct(EventoConvidadosRepository $eventoConvidadosRepo)
    {
        $this->eventoConvidadosRepository = $eventoConvidadosRepo;
    }

    /**
     * Display a listing of the EventoConvidados.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventoConvidadosRepository->pushCriteria(new RequestCriteria($request));
        $eventoConvidados = $this->eventoConvidadosRepository->paginate(10);

        return view('evento_convidados.index')
            ->with('eventoConvidados', $eventoConvidados);
    }

    /**
     * Show the form for creating a new EventoConvidados.
     *
     * @return Response
     */
    public function create()
    {
        return view('evento_convidados.create');
    }

    /**
     * Store a newly created EventoConvidados in storage.
     *
     * @param CreateEventoConvidadosRequest $request
     *
     * @return Response
     */
    public function store(CreateEventoConvidadosRequest $request)
    {
        $input = $request->all();

        $eventoConvidados = $this->eventoConvidadosRepository->create($input);

        Flash::success('Evento Convidados saved successfully.');

        return redirect(route('eventoConvidados.index'));
    }

    /**
     * Display the specified EventoConvidados.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eventoConvidados = $this->eventoConvidadosRepository->findWithoutFail($id);

        if (empty($eventoConvidados)) {
            Flash::error('Evento Convidados not found');

            return redirect(route('eventoConvidados.index'));
        }

        return view('evento_convidados.show')->with('eventoConvidados', $eventoConvidados);
    }

    /**
     * Show the form for editing the specified EventoConvidados.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eventoConvidados = $this->eventoConvidadosRepository->findWithoutFail($id);

        if (empty($eventoConvidados)) {
            Flash::error('Evento Convidados not found');

            return redirect(route('eventoConvidados.index'));
        }

        return view('evento_convidados.edit')->with('eventoConvidados', $eventoConvidados);
    }

    /**
     * Update the specified EventoConvidados in storage.
     *
     * @param  int              $id
     * @param UpdateEventoConvidadosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventoConvidadosRequest $request)
    {
        $eventoConvidados = $this->eventoConvidadosRepository->findWithoutFail($id);

        if (empty($eventoConvidados)) {
            Flash::error('Evento Convidados not found');

            return redirect(route('eventoConvidados.index'));
        }

        $eventoConvidados = $this->eventoConvidadosRepository->update($request->all(), $id);

        Flash::success('Evento Convidados updated successfully.');

        return redirect(route('eventoConvidados.index'));
    }

    /**
     * Remove the specified EventoConvidados from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eventoConvidados = $this->eventoConvidadosRepository->findWithoutFail($id);

        if (empty($eventoConvidados)) {
            Flash::error('Evento Convidados not found');

            return redirect(route('eventoConvidados.index'));
        }

        $this->eventoConvidadosRepository->delete($id);

        Flash::success('Evento Convidados deleted successfully.');

        return redirect(route('eventoConvidados.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventoHistoricoRequest;
use App\Http\Requests\UpdateEventoHistoricoRequest;
use App\Repositories\EventoHistoricoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EventoHistoricoController extends AppBaseController
{
    /** @var  EventoHistoricoRepository */
    private $eventoHistoricoRepository;

    public function __construct(EventoHistoricoRepository $eventoHistoricoRepo)
    {
        $this->eventoHistoricoRepository = $eventoHistoricoRepo;
    }

    /**
     * Display a listing of the EventoHistorico.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventoHistoricoRepository->pushCriteria(new RequestCriteria($request));
        $eventoHistoricos = $this->eventoHistoricoRepository->paginate(10);

        return view('evento_historicos.index')
            ->with('eventoHistoricos', $eventoHistoricos);
    }

    /**
     * Show the form for creating a new EventoHistorico.
     *
     * @return Response
     */
    public function create()
    {
        return view('evento_historicos.create');
    }

    /**
     * Store a newly created EventoHistorico in storage.
     *
     * @param CreateEventoHistoricoRequest $request
     *
     * @return Response
     */
    public function store(CreateEventoHistoricoRequest $request)
    {
        $input = $request->all();

        $eventoHistorico = $this->eventoHistoricoRepository->create($input);

        Flash::success('Evento Historico saved successfully.');

        return redirect(route('eventoHistoricos.index'));
    }

    /**
     * Display the specified EventoHistorico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eventoHistorico = $this->eventoHistoricoRepository->findWithoutFail($id);

        if (empty($eventoHistorico)) {
            Flash::error('Evento Historico not found');

            return redirect(route('eventoHistoricos.index'));
        }

        return view('evento_historicos.show')->with('eventoHistorico', $eventoHistorico);
    }

    /**
     * Show the form for editing the specified EventoHistorico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eventoHistorico = $this->eventoHistoricoRepository->findWithoutFail($id);

        if (empty($eventoHistorico)) {
            Flash::error('Evento Historico not found');

            return redirect(route('eventoHistoricos.index'));
        }

        return view('evento_historicos.edit')->with('eventoHistorico', $eventoHistorico);
    }

    /**
     * Update the specified EventoHistorico in storage.
     *
     * @param  int              $id
     * @param UpdateEventoHistoricoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventoHistoricoRequest $request)
    {
        $eventoHistorico = $this->eventoHistoricoRepository->findWithoutFail($id);

        if (empty($eventoHistorico)) {
            Flash::error('Evento Historico not found');

            return redirect(route('eventoHistoricos.index'));
        }

        $eventoHistorico = $this->eventoHistoricoRepository->update($request->all(), $id);

        Flash::success('Evento Historico updated successfully.');

        return redirect(route('eventoHistoricos.index'));
    }

    /**
     * Remove the specified EventoHistorico from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eventoHistorico = $this->eventoHistoricoRepository->findWithoutFail($id);

        if (empty($eventoHistorico)) {
            Flash::error('Evento Historico not found');

            return redirect(route('eventoHistoricos.index'));
        }

        $this->eventoHistoricoRepository->delete($id);

        Flash::success('Evento Historico deleted successfully.');

        return redirect(route('eventoHistoricos.index'));
    }
}

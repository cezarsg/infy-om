<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventoMesasRequest;
use App\Http\Requests\UpdateEventoMesasRequest;
use App\Repositories\EventoMesasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EventoMesasController extends AppBaseController
{
    /** @var  EventoMesasRepository */
    private $eventoMesasRepository;

    public function __construct(EventoMesasRepository $eventoMesasRepo)
    {
        $this->eventoMesasRepository = $eventoMesasRepo;
    }

    /**
     * Display a listing of the EventoMesas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventoMesasRepository->pushCriteria(new RequestCriteria($request));
        $eventoMesas = $this->eventoMesasRepository->paginate(10);

        return view('evento_mesas.index')
            ->with('eventoMesas', $eventoMesas);
    }

    /**
     * Show the form for creating a new EventoMesas.
     *
     * @return Response
     */
    public function create()
    {
        return view('evento_mesas.create');
    }

    /**
     * Store a newly created EventoMesas in storage.
     *
     * @param CreateEventoMesasRequest $request
     *
     * @return Response
     */
    public function store(CreateEventoMesasRequest $request)
    {
        $input = $request->all();

        $eventoMesas = $this->eventoMesasRepository->create($input);

        Flash::success('Evento Mesas saved successfully.');

        return redirect(route('eventoMesas.index'));
    }

    /**
     * Display the specified EventoMesas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eventoMesas = $this->eventoMesasRepository->findWithoutFail($id);

        if (empty($eventoMesas)) {
            Flash::error('Evento Mesas not found');

            return redirect(route('eventoMesas.index'));
        }

        return view('evento_mesas.show')->with('eventoMesas', $eventoMesas);
    }

    /**
     * Show the form for editing the specified EventoMesas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eventoMesas = $this->eventoMesasRepository->findWithoutFail($id);

        if (empty($eventoMesas)) {
            Flash::error('Evento Mesas not found');

            return redirect(route('eventoMesas.index'));
        }

        return view('evento_mesas.edit')->with('eventoMesas', $eventoMesas);
    }

    /**
     * Update the specified EventoMesas in storage.
     *
     * @param  int              $id
     * @param UpdateEventoMesasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventoMesasRequest $request)
    {
        $eventoMesas = $this->eventoMesasRepository->findWithoutFail($id);

        if (empty($eventoMesas)) {
            Flash::error('Evento Mesas not found');

            return redirect(route('eventoMesas.index'));
        }

        $eventoMesas = $this->eventoMesasRepository->update($request->all(), $id);

        Flash::success('Evento Mesas updated successfully.');

        return redirect(route('eventoMesas.index'));
    }

    /**
     * Remove the specified EventoMesas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eventoMesas = $this->eventoMesasRepository->findWithoutFail($id);

        if (empty($eventoMesas)) {
            Flash::error('Evento Mesas not found');

            return redirect(route('eventoMesas.index'));
        }

        $this->eventoMesasRepository->delete($id);

        Flash::success('Evento Mesas deleted successfully.');

        return redirect(route('eventoMesas.index'));
    }
}

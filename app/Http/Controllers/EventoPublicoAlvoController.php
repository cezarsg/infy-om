<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventoPublicoAlvoRequest;
use App\Http\Requests\UpdateEventoPublicoAlvoRequest;
use App\Repositories\EventoPublicoAlvoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EventoPublicoAlvoController extends AppBaseController
{
    /** @var  EventoPublicoAlvoRepository */
    private $eventoPublicoAlvoRepository;

    public function __construct(EventoPublicoAlvoRepository $eventoPublicoAlvoRepo)
    {
        $this->eventoPublicoAlvoRepository = $eventoPublicoAlvoRepo;
    }

    /**
     * Display a listing of the EventoPublicoAlvo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventoPublicoAlvoRepository->pushCriteria(new RequestCriteria($request));
        $eventoPublicoAlvos = $this->eventoPublicoAlvoRepository->paginate(10);

        return view('evento_publico_alvos.index')
            ->with('eventoPublicoAlvos', $eventoPublicoAlvos);
    }

    /**
     * Show the form for creating a new EventoPublicoAlvo.
     *
     * @return Response
     */
    public function create()
    {
        return view('evento_publico_alvos.create');
    }

    /**
     * Store a newly created EventoPublicoAlvo in storage.
     *
     * @param CreateEventoPublicoAlvoRequest $request
     *
     * @return Response
     */
    public function store(CreateEventoPublicoAlvoRequest $request)
    {
        $input = $request->all();

        $eventoPublicoAlvo = $this->eventoPublicoAlvoRepository->create($input);

        Flash::success('Evento Publico Alvo saved successfully.');

        return redirect(route('eventoPublicoAlvos.index'));
    }

    /**
     * Display the specified EventoPublicoAlvo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eventoPublicoAlvo = $this->eventoPublicoAlvoRepository->findWithoutFail($id);

        if (empty($eventoPublicoAlvo)) {
            Flash::error('Evento Publico Alvo not found');

            return redirect(route('eventoPublicoAlvos.index'));
        }

        return view('evento_publico_alvos.show')->with('eventoPublicoAlvo', $eventoPublicoAlvo);
    }

    /**
     * Show the form for editing the specified EventoPublicoAlvo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eventoPublicoAlvo = $this->eventoPublicoAlvoRepository->findWithoutFail($id);

        if (empty($eventoPublicoAlvo)) {
            Flash::error('Evento Publico Alvo not found');

            return redirect(route('eventoPublicoAlvos.index'));
        }

        return view('evento_publico_alvos.edit')->with('eventoPublicoAlvo', $eventoPublicoAlvo);
    }

    /**
     * Update the specified EventoPublicoAlvo in storage.
     *
     * @param  int              $id
     * @param UpdateEventoPublicoAlvoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventoPublicoAlvoRequest $request)
    {
        $eventoPublicoAlvo = $this->eventoPublicoAlvoRepository->findWithoutFail($id);

        if (empty($eventoPublicoAlvo)) {
            Flash::error('Evento Publico Alvo not found');

            return redirect(route('eventoPublicoAlvos.index'));
        }

        $eventoPublicoAlvo = $this->eventoPublicoAlvoRepository->update($request->all(), $id);

        Flash::success('Evento Publico Alvo updated successfully.');

        return redirect(route('eventoPublicoAlvos.index'));
    }

    /**
     * Remove the specified EventoPublicoAlvo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eventoPublicoAlvo = $this->eventoPublicoAlvoRepository->findWithoutFail($id);

        if (empty($eventoPublicoAlvo)) {
            Flash::error('Evento Publico Alvo not found');

            return redirect(route('eventoPublicoAlvos.index'));
        }

        $this->eventoPublicoAlvoRepository->delete($id);

        Flash::success('Evento Publico Alvo deleted successfully.');

        return redirect(route('eventoPublicoAlvos.index'));
    }
}

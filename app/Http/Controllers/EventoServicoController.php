<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventoServicoRequest;
use App\Http\Requests\UpdateEventoServicoRequest;
use App\Repositories\EventoServicoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EventoServicoController extends AppBaseController
{
    /** @var  EventoServicoRepository */
    private $eventoServicoRepository;

    public function __construct(EventoServicoRepository $eventoServicoRepo)
    {
        $this->eventoServicoRepository = $eventoServicoRepo;
    }

    /**
     * Display a listing of the EventoServico.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->eventoServicoRepository->pushCriteria(new RequestCriteria($request));
        $eventoServicos = $this->eventoServicoRepository->paginate(10);

        return view('evento_servicos.index')
            ->with('eventoServicos', $eventoServicos);
    }

    /**
     * Show the form for creating a new EventoServico.
     *
     * @return Response
     */
    public function create()
    {
        return view('evento_servicos.create');
    }

    /**
     * Store a newly created EventoServico in storage.
     *
     * @param CreateEventoServicoRequest $request
     *
     * @return Response
     */
    public function store(CreateEventoServicoRequest $request)
    {
        $input = $request->all();

        $eventoServico = $this->eventoServicoRepository->create($input);

        Flash::success('Evento Servico saved successfully.');

        return redirect(route('eventoServicos.index'));
    }

    /**
     * Display the specified EventoServico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eventoServico = $this->eventoServicoRepository->findWithoutFail($id);

        if (empty($eventoServico)) {
            Flash::error('Evento Servico not found');

            return redirect(route('eventoServicos.index'));
        }

        return view('evento_servicos.show')->with('eventoServico', $eventoServico);
    }

    /**
     * Show the form for editing the specified EventoServico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eventoServico = $this->eventoServicoRepository->findWithoutFail($id);

        if (empty($eventoServico)) {
            Flash::error('Evento Servico not found');

            return redirect(route('eventoServicos.index'));
        }

        return view('evento_servicos.edit')->with('eventoServico', $eventoServico);
    }

    /**
     * Update the specified EventoServico in storage.
     *
     * @param  int              $id
     * @param UpdateEventoServicoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventoServicoRequest $request)
    {
        $eventoServico = $this->eventoServicoRepository->findWithoutFail($id);

        if (empty($eventoServico)) {
            Flash::error('Evento Servico not found');

            return redirect(route('eventoServicos.index'));
        }

        $eventoServico = $this->eventoServicoRepository->update($request->all(), $id);

        Flash::success('Evento Servico updated successfully.');

        return redirect(route('eventoServicos.index'));
    }

    /**
     * Remove the specified EventoServico from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eventoServico = $this->eventoServicoRepository->findWithoutFail($id);

        if (empty($eventoServico)) {
            Flash::error('Evento Servico not found');

            return redirect(route('eventoServicos.index'));
        }

        $this->eventoServicoRepository->delete($id);

        Flash::success('Evento Servico deleted successfully.');

        return redirect(route('eventoServicos.index'));
    }
}

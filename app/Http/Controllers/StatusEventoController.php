<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStatusEventoRequest;
use App\Http\Requests\UpdateStatusEventoRequest;
use App\Repositories\StatusEventoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class StatusEventoController extends AppBaseController
{
    /** @var  StatusEventoRepository */
    private $statusEventoRepository;

    public function __construct(StatusEventoRepository $statusEventoRepo)
    {
        $this->statusEventoRepository = $statusEventoRepo;
    }

    /**
     * Display a listing of the StatusEvento.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->statusEventoRepository->pushCriteria(new RequestCriteria($request));
        $statusEventos = $this->statusEventoRepository->paginate(10);

        return view('status_eventos.index')
            ->with('statusEventos', $statusEventos);
    }

    /**
     * Show the form for creating a new StatusEvento.
     *
     * @return Response
     */
    public function create()
    {
        return view('status_eventos.create');
    }

    /**
     * Store a newly created StatusEvento in storage.
     *
     * @param CreateStatusEventoRequest $request
     *
     * @return Response
     */
    public function store(CreateStatusEventoRequest $request)
    {
        $input = $request->all();

        $statusEvento = $this->statusEventoRepository->create($input);

        Flash::success('Status Evento saved successfully.');

        return redirect(route('statusEventos.index'));
    }

    /**
     * Display the specified StatusEvento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $statusEvento = $this->statusEventoRepository->findWithoutFail($id);

        if (empty($statusEvento)) {
            Flash::error('Status Evento not found');

            return redirect(route('statusEventos.index'));
        }

        return view('status_eventos.show')->with('statusEvento', $statusEvento);
    }

    /**
     * Show the form for editing the specified StatusEvento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $statusEvento = $this->statusEventoRepository->findWithoutFail($id);

        if (empty($statusEvento)) {
            Flash::error('Status Evento not found');

            return redirect(route('statusEventos.index'));
        }

        return view('status_eventos.edit')->with('statusEvento', $statusEvento);
    }

    /**
     * Update the specified StatusEvento in storage.
     *
     * @param  int              $id
     * @param UpdateStatusEventoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStatusEventoRequest $request)
    {
        $statusEvento = $this->statusEventoRepository->findWithoutFail($id);

        if (empty($statusEvento)) {
            Flash::error('Status Evento not found');

            return redirect(route('statusEventos.index'));
        }

        $statusEvento = $this->statusEventoRepository->update($request->all(), $id);

        Flash::success('Status Evento updated successfully.');

        return redirect(route('statusEventos.index'));
    }

    /**
     * Remove the specified StatusEvento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $statusEvento = $this->statusEventoRepository->findWithoutFail($id);

        if (empty($statusEvento)) {
            Flash::error('Status Evento not found');

            return redirect(route('statusEventos.index'));
        }

        $this->statusEventoRepository->delete($id);

        Flash::success('Status Evento deleted successfully.');

        return redirect(route('statusEventos.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGrauEventoRequest;
use App\Http\Requests\UpdateGrauEventoRequest;
use App\Repositories\GrauEventoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class GrauEventoController extends AppBaseController
{
    /** @var  GrauEventoRepository */
    private $grauEventoRepository;

    public function __construct(GrauEventoRepository $grauEventoRepo)
    {
        $this->grauEventoRepository = $grauEventoRepo;
    }

    /**
     * Display a listing of the GrauEvento.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->grauEventoRepository->pushCriteria(new RequestCriteria($request));
        $grauEventos = $this->grauEventoRepository->paginate(10);

        return view('grau_eventos.index')
            ->with('grauEventos', $grauEventos);
    }

    /**
     * Show the form for creating a new GrauEvento.
     *
     * @return Response
     */
    public function create()
    {
        return view('grau_eventos.create');
    }

    /**
     * Store a newly created GrauEvento in storage.
     *
     * @param CreateGrauEventoRequest $request
     *
     * @return Response
     */
    public function store(CreateGrauEventoRequest $request)
    {
        $input = $request->all();

        $grauEvento = $this->grauEventoRepository->create($input);

        Flash::success('Grau Evento saved successfully.');

        return redirect(route('grauEventos.index'));
    }

    /**
     * Display the specified GrauEvento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $grauEvento = $this->grauEventoRepository->findWithoutFail($id);

        if (empty($grauEvento)) {
            Flash::error('Grau Evento not found');

            return redirect(route('grauEventos.index'));
        }

        return view('grau_eventos.show')->with('grauEvento', $grauEvento);
    }

    /**
     * Show the form for editing the specified GrauEvento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $grauEvento = $this->grauEventoRepository->findWithoutFail($id);

        if (empty($grauEvento)) {
            Flash::error('Grau Evento not found');

            return redirect(route('grauEventos.index'));
        }

        return view('grau_eventos.edit')->with('grauEvento', $grauEvento);
    }

    /**
     * Update the specified GrauEvento in storage.
     *
     * @param  int              $id
     * @param UpdateGrauEventoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGrauEventoRequest $request)
    {
        $grauEvento = $this->grauEventoRepository->findWithoutFail($id);

        if (empty($grauEvento)) {
            Flash::error('Grau Evento not found');

            return redirect(route('grauEventos.index'));
        }

        $grauEvento = $this->grauEventoRepository->update($request->all(), $id);

        Flash::success('Grau Evento updated successfully.');

        return redirect(route('grauEventos.index'));
    }

    /**
     * Remove the specified GrauEvento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $grauEvento = $this->grauEventoRepository->findWithoutFail($id);

        if (empty($grauEvento)) {
            Flash::error('Grau Evento not found');

            return redirect(route('grauEventos.index'));
        }

        $this->grauEventoRepository->delete($id);

        Flash::success('Grau Evento deleted successfully.');

        return redirect(route('grauEventos.index'));
    }
}

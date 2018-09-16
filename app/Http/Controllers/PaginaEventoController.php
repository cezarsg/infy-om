<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaginaEventoRequest;
use App\Http\Requests\UpdatePaginaEventoRequest;
use App\Repositories\PaginaEventoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PaginaEventoController extends AppBaseController
{
    /** @var  PaginaEventoRepository */
    private $paginaEventoRepository;

    public function __construct(PaginaEventoRepository $paginaEventoRepo)
    {
        $this->paginaEventoRepository = $paginaEventoRepo;
    }

    /**
     * Display a listing of the PaginaEvento.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->paginaEventoRepository->pushCriteria(new RequestCriteria($request));
        $paginaEventos = $this->paginaEventoRepository->paginate(10);

        return view('pagina_eventos.index')
            ->with('paginaEventos', $paginaEventos);
    }

    /**
     * Show the form for creating a new PaginaEvento.
     *
     * @return Response
     */
    public function create()
    {
        return view('pagina_eventos.create');
    }

    /**
     * Store a newly created PaginaEvento in storage.
     *
     * @param CreatePaginaEventoRequest $request
     *
     * @return Response
     */
    public function store(CreatePaginaEventoRequest $request)
    {
        $input = $request->all();

        $paginaEvento = $this->paginaEventoRepository->create($input);

        Flash::success('Pagina Evento saved successfully.');

        return redirect(route('paginaEventos.index'));
    }

    /**
     * Display the specified PaginaEvento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paginaEvento = $this->paginaEventoRepository->findWithoutFail($id);

        if (empty($paginaEvento)) {
            Flash::error('Pagina Evento not found');

            return redirect(route('paginaEventos.index'));
        }

        return view('pagina_eventos.show')->with('paginaEvento', $paginaEvento);
    }

    /**
     * Show the form for editing the specified PaginaEvento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paginaEvento = $this->paginaEventoRepository->findWithoutFail($id);

        if (empty($paginaEvento)) {
            Flash::error('Pagina Evento not found');

            return redirect(route('paginaEventos.index'));
        }

        return view('pagina_eventos.edit')->with('paginaEvento', $paginaEvento);
    }

    /**
     * Update the specified PaginaEvento in storage.
     *
     * @param  int              $id
     * @param UpdatePaginaEventoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaginaEventoRequest $request)
    {
        $paginaEvento = $this->paginaEventoRepository->findWithoutFail($id);

        if (empty($paginaEvento)) {
            Flash::error('Pagina Evento not found');

            return redirect(route('paginaEventos.index'));
        }

        $paginaEvento = $this->paginaEventoRepository->update($request->all(), $id);

        Flash::success('Pagina Evento updated successfully.');

        return redirect(route('paginaEventos.index'));
    }

    /**
     * Remove the specified PaginaEvento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paginaEvento = $this->paginaEventoRepository->findWithoutFail($id);

        if (empty($paginaEvento)) {
            Flash::error('Pagina Evento not found');

            return redirect(route('paginaEventos.index'));
        }

        $this->paginaEventoRepository->delete($id);

        Flash::success('Pagina Evento deleted successfully.');

        return redirect(route('paginaEventos.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaginaEventoFotosRequest;
use App\Http\Requests\UpdatePaginaEventoFotosRequest;
use App\Repositories\PaginaEventoFotosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PaginaEventoFotosController extends AppBaseController
{
    /** @var  PaginaEventoFotosRepository */
    private $paginaEventoFotosRepository;

    public function __construct(PaginaEventoFotosRepository $paginaEventoFotosRepo)
    {
        $this->paginaEventoFotosRepository = $paginaEventoFotosRepo;
    }

    /**
     * Display a listing of the PaginaEventoFotos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->paginaEventoFotosRepository->pushCriteria(new RequestCriteria($request));
        $paginaEventoFotos = $this->paginaEventoFotosRepository->paginate(10);

        return view('pagina_evento_fotos.index')
            ->with('paginaEventoFotos', $paginaEventoFotos);
    }

    /**
     * Show the form for creating a new PaginaEventoFotos.
     *
     * @return Response
     */
    public function create()
    {
        return view('pagina_evento_fotos.create');
    }

    /**
     * Store a newly created PaginaEventoFotos in storage.
     *
     * @param CreatePaginaEventoFotosRequest $request
     *
     * @return Response
     */
    public function store(CreatePaginaEventoFotosRequest $request)
    {
        $input = $request->all();

        $paginaEventoFotos = $this->paginaEventoFotosRepository->create($input);

        Flash::success('Pagina Evento Fotos saved successfully.');

        return redirect(route('paginaEventoFotos.index'));
    }

    /**
     * Display the specified PaginaEventoFotos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paginaEventoFotos = $this->paginaEventoFotosRepository->findWithoutFail($id);

        if (empty($paginaEventoFotos)) {
            Flash::error('Pagina Evento Fotos not found');

            return redirect(route('paginaEventoFotos.index'));
        }

        return view('pagina_evento_fotos.show')->with('paginaEventoFotos', $paginaEventoFotos);
    }

    /**
     * Show the form for editing the specified PaginaEventoFotos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paginaEventoFotos = $this->paginaEventoFotosRepository->findWithoutFail($id);

        if (empty($paginaEventoFotos)) {
            Flash::error('Pagina Evento Fotos not found');

            return redirect(route('paginaEventoFotos.index'));
        }

        return view('pagina_evento_fotos.edit')->with('paginaEventoFotos', $paginaEventoFotos);
    }

    /**
     * Update the specified PaginaEventoFotos in storage.
     *
     * @param  int              $id
     * @param UpdatePaginaEventoFotosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaginaEventoFotosRequest $request)
    {
        $paginaEventoFotos = $this->paginaEventoFotosRepository->findWithoutFail($id);

        if (empty($paginaEventoFotos)) {
            Flash::error('Pagina Evento Fotos not found');

            return redirect(route('paginaEventoFotos.index'));
        }

        $paginaEventoFotos = $this->paginaEventoFotosRepository->update($request->all(), $id);

        Flash::success('Pagina Evento Fotos updated successfully.');

        return redirect(route('paginaEventoFotos.index'));
    }

    /**
     * Remove the specified PaginaEventoFotos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paginaEventoFotos = $this->paginaEventoFotosRepository->findWithoutFail($id);

        if (empty($paginaEventoFotos)) {
            Flash::error('Pagina Evento Fotos not found');

            return redirect(route('paginaEventoFotos.index'));
        }

        $this->paginaEventoFotosRepository->delete($id);

        Flash::success('Pagina Evento Fotos deleted successfully.');

        return redirect(route('paginaEventoFotos.index'));
    }
}

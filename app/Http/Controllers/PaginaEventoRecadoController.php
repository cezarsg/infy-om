<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaginaEventoRecadoRequest;
use App\Http\Requests\UpdatePaginaEventoRecadoRequest;
use App\Repositories\PaginaEventoRecadoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PaginaEventoRecadoController extends AppBaseController
{
    /** @var  PaginaEventoRecadoRepository */
    private $paginaEventoRecadoRepository;

    public function __construct(PaginaEventoRecadoRepository $paginaEventoRecadoRepo)
    {
        $this->paginaEventoRecadoRepository = $paginaEventoRecadoRepo;
    }

    /**
     * Display a listing of the PaginaEventoRecado.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->paginaEventoRecadoRepository->pushCriteria(new RequestCriteria($request));
        $paginaEventoRecados = $this->paginaEventoRecadoRepository->paginate(10);

        return view('pagina_evento_recados.index')
            ->with('paginaEventoRecados', $paginaEventoRecados);
    }

    /**
     * Show the form for creating a new PaginaEventoRecado.
     *
     * @return Response
     */
    public function create()
    {
        return view('pagina_evento_recados.create');
    }

    /**
     * Store a newly created PaginaEventoRecado in storage.
     *
     * @param CreatePaginaEventoRecadoRequest $request
     *
     * @return Response
     */
    public function store(CreatePaginaEventoRecadoRequest $request)
    {
        $input = $request->all();

        $paginaEventoRecado = $this->paginaEventoRecadoRepository->create($input);

        Flash::success('Pagina Evento Recado saved successfully.');

        return redirect(route('paginaEventoRecados.index'));
    }

    /**
     * Display the specified PaginaEventoRecado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paginaEventoRecado = $this->paginaEventoRecadoRepository->findWithoutFail($id);

        if (empty($paginaEventoRecado)) {
            Flash::error('Pagina Evento Recado not found');

            return redirect(route('paginaEventoRecados.index'));
        }

        return view('pagina_evento_recados.show')->with('paginaEventoRecado', $paginaEventoRecado);
    }

    /**
     * Show the form for editing the specified PaginaEventoRecado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paginaEventoRecado = $this->paginaEventoRecadoRepository->findWithoutFail($id);

        if (empty($paginaEventoRecado)) {
            Flash::error('Pagina Evento Recado not found');

            return redirect(route('paginaEventoRecados.index'));
        }

        return view('pagina_evento_recados.edit')->with('paginaEventoRecado', $paginaEventoRecado);
    }

    /**
     * Update the specified PaginaEventoRecado in storage.
     *
     * @param  int              $id
     * @param UpdatePaginaEventoRecadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaginaEventoRecadoRequest $request)
    {
        $paginaEventoRecado = $this->paginaEventoRecadoRepository->findWithoutFail($id);

        if (empty($paginaEventoRecado)) {
            Flash::error('Pagina Evento Recado not found');

            return redirect(route('paginaEventoRecados.index'));
        }

        $paginaEventoRecado = $this->paginaEventoRecadoRepository->update($request->all(), $id);

        Flash::success('Pagina Evento Recado updated successfully.');

        return redirect(route('paginaEventoRecados.index'));
    }

    /**
     * Remove the specified PaginaEventoRecado from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paginaEventoRecado = $this->paginaEventoRecadoRepository->findWithoutFail($id);

        if (empty($paginaEventoRecado)) {
            Flash::error('Pagina Evento Recado not found');

            return redirect(route('paginaEventoRecados.index'));
        }

        $this->paginaEventoRecadoRepository->delete($id);

        Flash::success('Pagina Evento Recado deleted successfully.');

        return redirect(route('paginaEventoRecados.index'));
    }
}

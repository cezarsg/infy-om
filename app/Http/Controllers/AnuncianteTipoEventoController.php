<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnuncianteTipoEventoRequest;
use App\Http\Requests\UpdateAnuncianteTipoEventoRequest;
use App\Repositories\AnuncianteTipoEventoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AnuncianteTipoEventoController extends AppBaseController
{
    /** @var  AnuncianteTipoEventoRepository */
    private $anuncianteTipoEventoRepository;

    public function __construct(AnuncianteTipoEventoRepository $anuncianteTipoEventoRepo)
    {
        $this->anuncianteTipoEventoRepository = $anuncianteTipoEventoRepo;
    }

    /**
     * Display a listing of the AnuncianteTipoEvento.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncianteTipoEventoRepository->pushCriteria(new RequestCriteria($request));
        $anuncianteTipoEventos = $this->anuncianteTipoEventoRepository->paginate(10);

        return view('anunciante_tipo_eventos.index')
            ->with('anuncianteTipoEventos', $anuncianteTipoEventos);
    }

    /**
     * Show the form for creating a new AnuncianteTipoEvento.
     *
     * @return Response
     */
    public function create()
    {
        return view('anunciante_tipo_eventos.create');
    }

    /**
     * Store a newly created AnuncianteTipoEvento in storage.
     *
     * @param CreateAnuncianteTipoEventoRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncianteTipoEventoRequest $request)
    {
        $input = $request->all();

        $anuncianteTipoEvento = $this->anuncianteTipoEventoRepository->create($input);

        Flash::success('Anunciante Tipo Evento saved successfully.');

        return redirect(route('anuncianteTipoEventos.index'));
    }

    /**
     * Display the specified AnuncianteTipoEvento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $anuncianteTipoEvento = $this->anuncianteTipoEventoRepository->findWithoutFail($id);

        if (empty($anuncianteTipoEvento)) {
            Flash::error('Anunciante Tipo Evento not found');

            return redirect(route('anuncianteTipoEventos.index'));
        }

        return view('anunciante_tipo_eventos.show')->with('anuncianteTipoEvento', $anuncianteTipoEvento);
    }

    /**
     * Show the form for editing the specified AnuncianteTipoEvento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $anuncianteTipoEvento = $this->anuncianteTipoEventoRepository->findWithoutFail($id);

        if (empty($anuncianteTipoEvento)) {
            Flash::error('Anunciante Tipo Evento not found');

            return redirect(route('anuncianteTipoEventos.index'));
        }

        return view('anunciante_tipo_eventos.edit')->with('anuncianteTipoEvento', $anuncianteTipoEvento);
    }

    /**
     * Update the specified AnuncianteTipoEvento in storage.
     *
     * @param  int              $id
     * @param UpdateAnuncianteTipoEventoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncianteTipoEventoRequest $request)
    {
        $anuncianteTipoEvento = $this->anuncianteTipoEventoRepository->findWithoutFail($id);

        if (empty($anuncianteTipoEvento)) {
            Flash::error('Anunciante Tipo Evento not found');

            return redirect(route('anuncianteTipoEventos.index'));
        }

        $anuncianteTipoEvento = $this->anuncianteTipoEventoRepository->update($request->all(), $id);

        Flash::success('Anunciante Tipo Evento updated successfully.');

        return redirect(route('anuncianteTipoEventos.index'));
    }

    /**
     * Remove the specified AnuncianteTipoEvento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $anuncianteTipoEvento = $this->anuncianteTipoEventoRepository->findWithoutFail($id);

        if (empty($anuncianteTipoEvento)) {
            Flash::error('Anunciante Tipo Evento not found');

            return redirect(route('anuncianteTipoEventos.index'));
        }

        $this->anuncianteTipoEventoRepository->delete($id);

        Flash::success('Anunciante Tipo Evento deleted successfully.');

        return redirect(route('anuncianteTipoEventos.index'));
    }
}

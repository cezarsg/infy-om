<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnuncioPrecoMedioEventoRequest;
use App\Http\Requests\UpdateAnuncioPrecoMedioEventoRequest;
use App\Repositories\AnuncioPrecoMedioEventoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AnuncioPrecoMedioEventoController extends AppBaseController
{
    /** @var  AnuncioPrecoMedioEventoRepository */
    private $anuncioPrecoMedioEventoRepository;

    public function __construct(AnuncioPrecoMedioEventoRepository $anuncioPrecoMedioEventoRepo)
    {
        $this->anuncioPrecoMedioEventoRepository = $anuncioPrecoMedioEventoRepo;
    }

    /**
     * Display a listing of the AnuncioPrecoMedioEvento.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncioPrecoMedioEventoRepository->pushCriteria(new RequestCriteria($request));
        $anuncioPrecoMedioEventos = $this->anuncioPrecoMedioEventoRepository->paginate(10);

        return view('anuncio_preco_medio_eventos.index')
            ->with('anuncioPrecoMedioEventos', $anuncioPrecoMedioEventos);
    }

    /**
     * Show the form for creating a new AnuncioPrecoMedioEvento.
     *
     * @return Response
     */
    public function create()
    {
        return view('anuncio_preco_medio_eventos.create');
    }

    /**
     * Store a newly created AnuncioPrecoMedioEvento in storage.
     *
     * @param CreateAnuncioPrecoMedioEventoRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncioPrecoMedioEventoRequest $request)
    {
        $input = $request->all();

        $anuncioPrecoMedioEvento = $this->anuncioPrecoMedioEventoRepository->create($input);

        Flash::success('Anuncio Preco Medio Evento saved successfully.');

        return redirect(route('anuncioPrecoMedioEventos.index'));
    }

    /**
     * Display the specified AnuncioPrecoMedioEvento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $anuncioPrecoMedioEvento = $this->anuncioPrecoMedioEventoRepository->findWithoutFail($id);

        if (empty($anuncioPrecoMedioEvento)) {
            Flash::error('Anuncio Preco Medio Evento not found');

            return redirect(route('anuncioPrecoMedioEventos.index'));
        }

        return view('anuncio_preco_medio_eventos.show')->with('anuncioPrecoMedioEvento', $anuncioPrecoMedioEvento);
    }

    /**
     * Show the form for editing the specified AnuncioPrecoMedioEvento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $anuncioPrecoMedioEvento = $this->anuncioPrecoMedioEventoRepository->findWithoutFail($id);

        if (empty($anuncioPrecoMedioEvento)) {
            Flash::error('Anuncio Preco Medio Evento not found');

            return redirect(route('anuncioPrecoMedioEventos.index'));
        }

        return view('anuncio_preco_medio_eventos.edit')->with('anuncioPrecoMedioEvento', $anuncioPrecoMedioEvento);
    }

    /**
     * Update the specified AnuncioPrecoMedioEvento in storage.
     *
     * @param  int              $id
     * @param UpdateAnuncioPrecoMedioEventoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncioPrecoMedioEventoRequest $request)
    {
        $anuncioPrecoMedioEvento = $this->anuncioPrecoMedioEventoRepository->findWithoutFail($id);

        if (empty($anuncioPrecoMedioEvento)) {
            Flash::error('Anuncio Preco Medio Evento not found');

            return redirect(route('anuncioPrecoMedioEventos.index'));
        }

        $anuncioPrecoMedioEvento = $this->anuncioPrecoMedioEventoRepository->update($request->all(), $id);

        Flash::success('Anuncio Preco Medio Evento updated successfully.');

        return redirect(route('anuncioPrecoMedioEventos.index'));
    }

    /**
     * Remove the specified AnuncioPrecoMedioEvento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $anuncioPrecoMedioEvento = $this->anuncioPrecoMedioEventoRepository->findWithoutFail($id);

        if (empty($anuncioPrecoMedioEvento)) {
            Flash::error('Anuncio Preco Medio Evento not found');

            return redirect(route('anuncioPrecoMedioEventos.index'));
        }

        $this->anuncioPrecoMedioEventoRepository->delete($id);

        Flash::success('Anuncio Preco Medio Evento deleted successfully.');

        return redirect(route('anuncioPrecoMedioEventos.index'));
    }
}

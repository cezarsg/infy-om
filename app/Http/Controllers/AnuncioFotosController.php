<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnuncioFotosRequest;
use App\Http\Requests\UpdateAnuncioFotosRequest;
use App\Repositories\AnuncioFotosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AnuncioFotosController extends AppBaseController
{
    /** @var  AnuncioFotosRepository */
    private $anuncioFotosRepository;

    public function __construct(AnuncioFotosRepository $anuncioFotosRepo)
    {
        $this->anuncioFotosRepository = $anuncioFotosRepo;
    }

    /**
     * Display a listing of the AnuncioFotos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncioFotosRepository->pushCriteria(new RequestCriteria($request));
        $anuncioFotos = $this->anuncioFotosRepository->paginate(10);

        return view('anuncio_fotos.index')
            ->with('anuncioFotos', $anuncioFotos);
    }

    /**
     * Show the form for creating a new AnuncioFotos.
     *
     * @return Response
     */
    public function create()
    {
        return view('anuncio_fotos.create');
    }

    /**
     * Store a newly created AnuncioFotos in storage.
     *
     * @param CreateAnuncioFotosRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncioFotosRequest $request)
    {
        $input = $request->all();

        $anuncioFotos = $this->anuncioFotosRepository->create($input);

        Flash::success('Anuncio Fotos saved successfully.');

        return redirect(route('anuncioFotos.index'));
    }

    /**
     * Display the specified AnuncioFotos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $anuncioFotos = $this->anuncioFotosRepository->findWithoutFail($id);

        if (empty($anuncioFotos)) {
            Flash::error('Anuncio Fotos not found');

            return redirect(route('anuncioFotos.index'));
        }

        return view('anuncio_fotos.show')->with('anuncioFotos', $anuncioFotos);
    }

    /**
     * Show the form for editing the specified AnuncioFotos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $anuncioFotos = $this->anuncioFotosRepository->findWithoutFail($id);

        if (empty($anuncioFotos)) {
            Flash::error('Anuncio Fotos not found');

            return redirect(route('anuncioFotos.index'));
        }

        return view('anuncio_fotos.edit')->with('anuncioFotos', $anuncioFotos);
    }

    /**
     * Update the specified AnuncioFotos in storage.
     *
     * @param  int              $id
     * @param UpdateAnuncioFotosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncioFotosRequest $request)
    {
        $anuncioFotos = $this->anuncioFotosRepository->findWithoutFail($id);

        if (empty($anuncioFotos)) {
            Flash::error('Anuncio Fotos not found');

            return redirect(route('anuncioFotos.index'));
        }

        $anuncioFotos = $this->anuncioFotosRepository->update($request->all(), $id);

        Flash::success('Anuncio Fotos updated successfully.');

        return redirect(route('anuncioFotos.index'));
    }

    /**
     * Remove the specified AnuncioFotos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $anuncioFotos = $this->anuncioFotosRepository->findWithoutFail($id);

        if (empty($anuncioFotos)) {
            Flash::error('Anuncio Fotos not found');

            return redirect(route('anuncioFotos.index'));
        }

        $this->anuncioFotosRepository->delete($id);

        Flash::success('Anuncio Fotos deleted successfully.');

        return redirect(route('anuncioFotos.index'));
    }
}

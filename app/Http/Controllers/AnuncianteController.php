<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnuncianteRequest;
use App\Http\Requests\UpdateAnuncianteRequest;
use App\Repositories\AnuncianteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AnuncianteController extends AppBaseController
{
    /** @var  AnuncianteRepository */
    private $anuncianteRepository;

    public function __construct(AnuncianteRepository $anuncianteRepo)
    {
        $this->anuncianteRepository = $anuncianteRepo;
    }

    /**
     * Display a listing of the Anunciante.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncianteRepository->pushCriteria(new RequestCriteria($request));
        $anunciantes = $this->anuncianteRepository->paginate(10);

        return view('anunciantes.index')
            ->with('anunciantes', $anunciantes);
    }

    /**
     * Show the form for creating a new Anunciante.
     *
     * @return Response
     */
    public function create()
    {
        return view('anunciantes.create');
    }

    /**
     * Store a newly created Anunciante in storage.
     *
     * @param CreateAnuncianteRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncianteRequest $request)
    {
        $input = $request->all();

        $anunciante = $this->anuncianteRepository->create($input);

        Flash::success('Anunciante saved successfully.');

        return redirect(route('anunciantes.index'));
    }

    /**
     * Display the specified Anunciante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $anunciante = $this->anuncianteRepository->findWithoutFail($id);

        if (empty($anunciante)) {
            Flash::error('Anunciante not found');

            return redirect(route('anunciantes.index'));
        }

        return view('anunciantes.show')->with('anunciante', $anunciante);
    }

    /**
     * Show the form for editing the specified Anunciante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $anunciante = $this->anuncianteRepository->findWithoutFail($id);

        if (empty($anunciante)) {
            Flash::error('Anunciante not found');

            return redirect(route('anunciantes.index'));
        }

        return view('anunciantes.edit')->with('anunciante', $anunciante);
    }

    /**
     * Update the specified Anunciante in storage.
     *
     * @param  int              $id
     * @param UpdateAnuncianteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncianteRequest $request)
    {
        $anunciante = $this->anuncianteRepository->findWithoutFail($id);

        if (empty($anunciante)) {
            Flash::error('Anunciante not found');

            return redirect(route('anunciantes.index'));
        }

        $anunciante = $this->anuncianteRepository->update($request->all(), $id);

        Flash::success('Anunciante updated successfully.');

        return redirect(route('anunciantes.index'));
    }

    /**
     * Remove the specified Anunciante from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $anunciante = $this->anuncianteRepository->findWithoutFail($id);

        if (empty($anunciante)) {
            Flash::error('Anunciante not found');

            return redirect(route('anunciantes.index'));
        }

        $this->anuncianteRepository->delete($id);

        Flash::success('Anunciante deleted successfully.');

        return redirect(route('anunciantes.index'));
    }
}

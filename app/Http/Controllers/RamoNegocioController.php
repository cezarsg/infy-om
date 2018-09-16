<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRamoNegocioRequest;
use App\Http\Requests\UpdateRamoNegocioRequest;
use App\Repositories\RamoNegocioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RamoNegocioController extends AppBaseController
{
    /** @var  RamoNegocioRepository */
    private $ramoNegocioRepository;

    public function __construct(RamoNegocioRepository $ramoNegocioRepo)
    {
        $this->ramoNegocioRepository = $ramoNegocioRepo;
    }

    /**
     * Display a listing of the RamoNegocio.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ramoNegocioRepository->pushCriteria(new RequestCriteria($request));
        $ramoNegocios = $this->ramoNegocioRepository->paginate(10);

        return view('ramo_negocios.index')
            ->with('ramoNegocios', $ramoNegocios);
    }

    /**
     * Show the form for creating a new RamoNegocio.
     *
     * @return Response
     */
    public function create()
    {
        return view('ramo_negocios.create');
    }

    /**
     * Store a newly created RamoNegocio in storage.
     *
     * @param CreateRamoNegocioRequest $request
     *
     * @return Response
     */
    public function store(CreateRamoNegocioRequest $request)
    {
        $input = $request->all();

        $ramoNegocio = $this->ramoNegocioRepository->create($input);

        Flash::success('Ramo Negocio saved successfully.');

        return redirect(route('ramoNegocios.index'));
    }

    /**
     * Display the specified RamoNegocio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ramoNegocio = $this->ramoNegocioRepository->findWithoutFail($id);

        if (empty($ramoNegocio)) {
            Flash::error('Ramo Negocio not found');

            return redirect(route('ramoNegocios.index'));
        }

        return view('ramo_negocios.show')->with('ramoNegocio', $ramoNegocio);
    }

    /**
     * Show the form for editing the specified RamoNegocio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ramoNegocio = $this->ramoNegocioRepository->findWithoutFail($id);

        if (empty($ramoNegocio)) {
            Flash::error('Ramo Negocio not found');

            return redirect(route('ramoNegocios.index'));
        }

        return view('ramo_negocios.edit')->with('ramoNegocio', $ramoNegocio);
    }

    /**
     * Update the specified RamoNegocio in storage.
     *
     * @param  int              $id
     * @param UpdateRamoNegocioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRamoNegocioRequest $request)
    {
        $ramoNegocio = $this->ramoNegocioRepository->findWithoutFail($id);

        if (empty($ramoNegocio)) {
            Flash::error('Ramo Negocio not found');

            return redirect(route('ramoNegocios.index'));
        }

        $ramoNegocio = $this->ramoNegocioRepository->update($request->all(), $id);

        Flash::success('Ramo Negocio updated successfully.');

        return redirect(route('ramoNegocios.index'));
    }

    /**
     * Remove the specified RamoNegocio from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ramoNegocio = $this->ramoNegocioRepository->findWithoutFail($id);

        if (empty($ramoNegocio)) {
            Flash::error('Ramo Negocio not found');

            return redirect(route('ramoNegocios.index'));
        }

        $this->ramoNegocioRepository->delete($id);

        Flash::success('Ramo Negocio deleted successfully.');

        return redirect(route('ramoNegocios.index'));
    }
}

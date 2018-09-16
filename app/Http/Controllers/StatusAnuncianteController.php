<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStatusAnuncianteRequest;
use App\Http\Requests\UpdateStatusAnuncianteRequest;
use App\Repositories\StatusAnuncianteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class StatusAnuncianteController extends AppBaseController
{
    /** @var  StatusAnuncianteRepository */
    private $statusAnuncianteRepository;

    public function __construct(StatusAnuncianteRepository $statusAnuncianteRepo)
    {
        $this->statusAnuncianteRepository = $statusAnuncianteRepo;
    }

    /**
     * Display a listing of the StatusAnunciante.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->statusAnuncianteRepository->pushCriteria(new RequestCriteria($request));
        $statusAnunciantes = $this->statusAnuncianteRepository->paginate(10);

        return view('status_anunciantes.index')
            ->with('statusAnunciantes', $statusAnunciantes);
    }

    /**
     * Show the form for creating a new StatusAnunciante.
     *
     * @return Response
     */
    public function create()
    {
        return view('status_anunciantes.create');
    }

    /**
     * Store a newly created StatusAnunciante in storage.
     *
     * @param CreateStatusAnuncianteRequest $request
     *
     * @return Response
     */
    public function store(CreateStatusAnuncianteRequest $request)
    {
        $input = $request->all();

        $statusAnunciante = $this->statusAnuncianteRepository->create($input);

        Flash::success('Status Anunciante saved successfully.');

        return redirect(route('statusAnunciantes.index'));
    }

    /**
     * Display the specified StatusAnunciante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $statusAnunciante = $this->statusAnuncianteRepository->findWithoutFail($id);

        if (empty($statusAnunciante)) {
            Flash::error('Status Anunciante not found');

            return redirect(route('statusAnunciantes.index'));
        }

        return view('status_anunciantes.show')->with('statusAnunciante', $statusAnunciante);
    }

    /**
     * Show the form for editing the specified StatusAnunciante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $statusAnunciante = $this->statusAnuncianteRepository->findWithoutFail($id);

        if (empty($statusAnunciante)) {
            Flash::error('Status Anunciante not found');

            return redirect(route('statusAnunciantes.index'));
        }

        return view('status_anunciantes.edit')->with('statusAnunciante', $statusAnunciante);
    }

    /**
     * Update the specified StatusAnunciante in storage.
     *
     * @param  int              $id
     * @param UpdateStatusAnuncianteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStatusAnuncianteRequest $request)
    {
        $statusAnunciante = $this->statusAnuncianteRepository->findWithoutFail($id);

        if (empty($statusAnunciante)) {
            Flash::error('Status Anunciante not found');

            return redirect(route('statusAnunciantes.index'));
        }

        $statusAnunciante = $this->statusAnuncianteRepository->update($request->all(), $id);

        Flash::success('Status Anunciante updated successfully.');

        return redirect(route('statusAnunciantes.index'));
    }

    /**
     * Remove the specified StatusAnunciante from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $statusAnunciante = $this->statusAnuncianteRepository->findWithoutFail($id);

        if (empty($statusAnunciante)) {
            Flash::error('Status Anunciante not found');

            return redirect(route('statusAnunciantes.index'));
        }

        $this->statusAnuncianteRepository->delete($id);

        Flash::success('Status Anunciante deleted successfully.');

        return redirect(route('statusAnunciantes.index'));
    }
}

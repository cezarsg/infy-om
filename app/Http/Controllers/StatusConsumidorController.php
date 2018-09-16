<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStatusConsumidorRequest;
use App\Http\Requests\UpdateStatusConsumidorRequest;
use App\Repositories\StatusConsumidorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class StatusConsumidorController extends AppBaseController
{
    /** @var  StatusConsumidorRepository */
    private $statusConsumidorRepository;

    public function __construct(StatusConsumidorRepository $statusConsumidorRepo)
    {
        $this->statusConsumidorRepository = $statusConsumidorRepo;
    }

    /**
     * Display a listing of the StatusConsumidor.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->statusConsumidorRepository->pushCriteria(new RequestCriteria($request));
        $statusConsumidors = $this->statusConsumidorRepository->paginate(10);

        return view('status_consumidors.index')
            ->with('statusConsumidors', $statusConsumidors);
    }

    /**
     * Show the form for creating a new StatusConsumidor.
     *
     * @return Response
     */
    public function create()
    {
        return view('status_consumidors.create');
    }

    /**
     * Store a newly created StatusConsumidor in storage.
     *
     * @param CreateStatusConsumidorRequest $request
     *
     * @return Response
     */
    public function store(CreateStatusConsumidorRequest $request)
    {
        $input = $request->all();

        $statusConsumidor = $this->statusConsumidorRepository->create($input);

        Flash::success('Status Consumidor saved successfully.');

        return redirect(route('statusConsumidors.index'));
    }

    /**
     * Display the specified StatusConsumidor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $statusConsumidor = $this->statusConsumidorRepository->findWithoutFail($id);

        if (empty($statusConsumidor)) {
            Flash::error('Status Consumidor not found');

            return redirect(route('statusConsumidors.index'));
        }

        return view('status_consumidors.show')->with('statusConsumidor', $statusConsumidor);
    }

    /**
     * Show the form for editing the specified StatusConsumidor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $statusConsumidor = $this->statusConsumidorRepository->findWithoutFail($id);

        if (empty($statusConsumidor)) {
            Flash::error('Status Consumidor not found');

            return redirect(route('statusConsumidors.index'));
        }

        return view('status_consumidors.edit')->with('statusConsumidor', $statusConsumidor);
    }

    /**
     * Update the specified StatusConsumidor in storage.
     *
     * @param  int              $id
     * @param UpdateStatusConsumidorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStatusConsumidorRequest $request)
    {
        $statusConsumidor = $this->statusConsumidorRepository->findWithoutFail($id);

        if (empty($statusConsumidor)) {
            Flash::error('Status Consumidor not found');

            return redirect(route('statusConsumidors.index'));
        }

        $statusConsumidor = $this->statusConsumidorRepository->update($request->all(), $id);

        Flash::success('Status Consumidor updated successfully.');

        return redirect(route('statusConsumidors.index'));
    }

    /**
     * Remove the specified StatusConsumidor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $statusConsumidor = $this->statusConsumidorRepository->findWithoutFail($id);

        if (empty($statusConsumidor)) {
            Flash::error('Status Consumidor not found');

            return redirect(route('statusConsumidors.index'));
        }

        $this->statusConsumidorRepository->delete($id);

        Flash::success('Status Consumidor deleted successfully.');

        return redirect(route('statusConsumidors.index'));
    }
}

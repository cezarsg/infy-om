<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConsumidorRequest;
use App\Http\Requests\UpdateConsumidorRequest;
use App\Repositories\ConsumidorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ConsumidorController extends AppBaseController
{
    /** @var  ConsumidorRepository */
    private $consumidorRepository;

    public function __construct(ConsumidorRepository $consumidorRepo)
    {
        $this->consumidorRepository = $consumidorRepo;
    }

    /**
     * Display a listing of the Consumidor.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->consumidorRepository->pushCriteria(new RequestCriteria($request));
        $consumidors = $this->consumidorRepository->paginate(10);

        return view('consumidors.index')
            ->with('consumidors', $consumidors);
    }

    /**
     * Show the form for creating a new Consumidor.
     *
     * @return Response
     */
    public function create()
    {
        return view('consumidors.create');
    }

    /**
     * Store a newly created Consumidor in storage.
     *
     * @param CreateConsumidorRequest $request
     *
     * @return Response
     */
    public function store(CreateConsumidorRequest $request)
    {
        $input = $request->all();

        $consumidor = $this->consumidorRepository->create($input);

        Flash::success('Consumidor saved successfully.');

        return redirect(route('consumidors.index'));
    }

    /**
     * Display the specified Consumidor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $consumidor = $this->consumidorRepository->findWithoutFail($id);

        if (empty($consumidor)) {
            Flash::error('Consumidor not found');

            return redirect(route('consumidors.index'));
        }

        return view('consumidors.show')->with('consumidor', $consumidor);
    }

    /**
     * Show the form for editing the specified Consumidor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $consumidor = $this->consumidorRepository->findWithoutFail($id);

        if (empty($consumidor)) {
            Flash::error('Consumidor not found');

            return redirect(route('consumidors.index'));
        }

        return view('consumidors.edit')->with('consumidor', $consumidor);
    }

    /**
     * Update the specified Consumidor in storage.
     *
     * @param  int              $id
     * @param UpdateConsumidorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConsumidorRequest $request)
    {
        $consumidor = $this->consumidorRepository->findWithoutFail($id);

        if (empty($consumidor)) {
            Flash::error('Consumidor not found');

            return redirect(route('consumidors.index'));
        }

        $consumidor = $this->consumidorRepository->update($request->all(), $id);

        Flash::success('Consumidor updated successfully.');

        return redirect(route('consumidors.index'));
    }

    /**
     * Remove the specified Consumidor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $consumidor = $this->consumidorRepository->findWithoutFail($id);

        if (empty($consumidor)) {
            Flash::error('Consumidor not found');

            return redirect(route('consumidors.index'));
        }

        $this->consumidorRepository->delete($id);

        Flash::success('Consumidor deleted successfully.');

        return redirect(route('consumidors.index'));
    }
}

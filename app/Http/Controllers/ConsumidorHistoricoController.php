<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConsumidorHistoricoRequest;
use App\Http\Requests\UpdateConsumidorHistoricoRequest;
use App\Repositories\ConsumidorHistoricoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ConsumidorHistoricoController extends AppBaseController
{
    /** @var  ConsumidorHistoricoRepository */
    private $consumidorHistoricoRepository;

    public function __construct(ConsumidorHistoricoRepository $consumidorHistoricoRepo)
    {
        $this->consumidorHistoricoRepository = $consumidorHistoricoRepo;
    }

    /**
     * Display a listing of the ConsumidorHistorico.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->consumidorHistoricoRepository->pushCriteria(new RequestCriteria($request));
        $consumidorHistoricos = $this->consumidorHistoricoRepository->paginate(10);

        return view('consumidor_historicos.index')
            ->with('consumidorHistoricos', $consumidorHistoricos);
    }

    /**
     * Show the form for creating a new ConsumidorHistorico.
     *
     * @return Response
     */
    public function create()
    {
        return view('consumidor_historicos.create');
    }

    /**
     * Store a newly created ConsumidorHistorico in storage.
     *
     * @param CreateConsumidorHistoricoRequest $request
     *
     * @return Response
     */
    public function store(CreateConsumidorHistoricoRequest $request)
    {
        $input = $request->all();

        $consumidorHistorico = $this->consumidorHistoricoRepository->create($input);

        Flash::success('Consumidor Historico saved successfully.');

        return redirect(route('consumidorHistoricos.index'));
    }

    /**
     * Display the specified ConsumidorHistorico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $consumidorHistorico = $this->consumidorHistoricoRepository->findWithoutFail($id);

        if (empty($consumidorHistorico)) {
            Flash::error('Consumidor Historico not found');

            return redirect(route('consumidorHistoricos.index'));
        }

        return view('consumidor_historicos.show')->with('consumidorHistorico', $consumidorHistorico);
    }

    /**
     * Show the form for editing the specified ConsumidorHistorico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $consumidorHistorico = $this->consumidorHistoricoRepository->findWithoutFail($id);

        if (empty($consumidorHistorico)) {
            Flash::error('Consumidor Historico not found');

            return redirect(route('consumidorHistoricos.index'));
        }

        return view('consumidor_historicos.edit')->with('consumidorHistorico', $consumidorHistorico);
    }

    /**
     * Update the specified ConsumidorHistorico in storage.
     *
     * @param  int              $id
     * @param UpdateConsumidorHistoricoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConsumidorHistoricoRequest $request)
    {
        $consumidorHistorico = $this->consumidorHistoricoRepository->findWithoutFail($id);

        if (empty($consumidorHistorico)) {
            Flash::error('Consumidor Historico not found');

            return redirect(route('consumidorHistoricos.index'));
        }

        $consumidorHistorico = $this->consumidorHistoricoRepository->update($request->all(), $id);

        Flash::success('Consumidor Historico updated successfully.');

        return redirect(route('consumidorHistoricos.index'));
    }

    /**
     * Remove the specified ConsumidorHistorico from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $consumidorHistorico = $this->consumidorHistoricoRepository->findWithoutFail($id);

        if (empty($consumidorHistorico)) {
            Flash::error('Consumidor Historico not found');

            return redirect(route('consumidorHistoricos.index'));
        }

        $this->consumidorHistoricoRepository->delete($id);

        Flash::success('Consumidor Historico deleted successfully.');

        return redirect(route('consumidorHistoricos.index'));
    }
}

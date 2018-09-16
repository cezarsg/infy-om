<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStatusOrcamentoRequest;
use App\Http\Requests\UpdateStatusOrcamentoRequest;
use App\Repositories\StatusOrcamentoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class StatusOrcamentoController extends AppBaseController
{
    /** @var  StatusOrcamentoRepository */
    private $statusOrcamentoRepository;

    public function __construct(StatusOrcamentoRepository $statusOrcamentoRepo)
    {
        $this->statusOrcamentoRepository = $statusOrcamentoRepo;
    }

    /**
     * Display a listing of the StatusOrcamento.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->statusOrcamentoRepository->pushCriteria(new RequestCriteria($request));
        $statusOrcamentos = $this->statusOrcamentoRepository->paginate(10);

        return view('status_orcamentos.index')
            ->with('statusOrcamentos', $statusOrcamentos);
    }

    /**
     * Show the form for creating a new StatusOrcamento.
     *
     * @return Response
     */
    public function create()
    {
        return view('status_orcamentos.create');
    }

    /**
     * Store a newly created StatusOrcamento in storage.
     *
     * @param CreateStatusOrcamentoRequest $request
     *
     * @return Response
     */
    public function store(CreateStatusOrcamentoRequest $request)
    {
        $input = $request->all();

        $statusOrcamento = $this->statusOrcamentoRepository->create($input);

        Flash::success('Status Orcamento saved successfully.');

        return redirect(route('statusOrcamentos.index'));
    }

    /**
     * Display the specified StatusOrcamento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $statusOrcamento = $this->statusOrcamentoRepository->findWithoutFail($id);

        if (empty($statusOrcamento)) {
            Flash::error('Status Orcamento not found');

            return redirect(route('statusOrcamentos.index'));
        }

        return view('status_orcamentos.show')->with('statusOrcamento', $statusOrcamento);
    }

    /**
     * Show the form for editing the specified StatusOrcamento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $statusOrcamento = $this->statusOrcamentoRepository->findWithoutFail($id);

        if (empty($statusOrcamento)) {
            Flash::error('Status Orcamento not found');

            return redirect(route('statusOrcamentos.index'));
        }

        return view('status_orcamentos.edit')->with('statusOrcamento', $statusOrcamento);
    }

    /**
     * Update the specified StatusOrcamento in storage.
     *
     * @param  int              $id
     * @param UpdateStatusOrcamentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStatusOrcamentoRequest $request)
    {
        $statusOrcamento = $this->statusOrcamentoRepository->findWithoutFail($id);

        if (empty($statusOrcamento)) {
            Flash::error('Status Orcamento not found');

            return redirect(route('statusOrcamentos.index'));
        }

        $statusOrcamento = $this->statusOrcamentoRepository->update($request->all(), $id);

        Flash::success('Status Orcamento updated successfully.');

        return redirect(route('statusOrcamentos.index'));
    }

    /**
     * Remove the specified StatusOrcamento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $statusOrcamento = $this->statusOrcamentoRepository->findWithoutFail($id);

        if (empty($statusOrcamento)) {
            Flash::error('Status Orcamento not found');

            return redirect(route('statusOrcamentos.index'));
        }

        $this->statusOrcamentoRepository->delete($id);

        Flash::success('Status Orcamento deleted successfully.');

        return redirect(route('statusOrcamentos.index'));
    }
}

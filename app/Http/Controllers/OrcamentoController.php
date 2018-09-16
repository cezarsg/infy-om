<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrcamentoRequest;
use App\Http\Requests\UpdateOrcamentoRequest;
use App\Repositories\OrcamentoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class OrcamentoController extends AppBaseController
{
    /** @var  OrcamentoRepository */
    private $orcamentoRepository;

    public function __construct(OrcamentoRepository $orcamentoRepo)
    {
        $this->orcamentoRepository = $orcamentoRepo;
    }

    /**
     * Display a listing of the Orcamento.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->orcamentoRepository->pushCriteria(new RequestCriteria($request));
        $orcamentos = $this->orcamentoRepository->paginate(10);

        return view('orcamentos.index')
            ->with('orcamentos', $orcamentos);
    }

    /**
     * Show the form for creating a new Orcamento.
     *
     * @return Response
     */
    public function create()
    {
        return view('orcamentos.create');
    }

    /**
     * Store a newly created Orcamento in storage.
     *
     * @param CreateOrcamentoRequest $request
     *
     * @return Response
     */
    public function store(CreateOrcamentoRequest $request)
    {
        $input = $request->all();

        $orcamento = $this->orcamentoRepository->create($input);

        Flash::success('Orcamento saved successfully.');

        return redirect(route('orcamentos.index'));
    }

    /**
     * Display the specified Orcamento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $orcamento = $this->orcamentoRepository->findWithoutFail($id);

        if (empty($orcamento)) {
            Flash::error('Orcamento not found');

            return redirect(route('orcamentos.index'));
        }

        return view('orcamentos.show')->with('orcamento', $orcamento);
    }

    /**
     * Show the form for editing the specified Orcamento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $orcamento = $this->orcamentoRepository->findWithoutFail($id);

        if (empty($orcamento)) {
            Flash::error('Orcamento not found');

            return redirect(route('orcamentos.index'));
        }

        return view('orcamentos.edit')->with('orcamento', $orcamento);
    }

    /**
     * Update the specified Orcamento in storage.
     *
     * @param  int              $id
     * @param UpdateOrcamentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrcamentoRequest $request)
    {
        $orcamento = $this->orcamentoRepository->findWithoutFail($id);

        if (empty($orcamento)) {
            Flash::error('Orcamento not found');

            return redirect(route('orcamentos.index'));
        }

        $orcamento = $this->orcamentoRepository->update($request->all(), $id);

        Flash::success('Orcamento updated successfully.');

        return redirect(route('orcamentos.index'));
    }

    /**
     * Remove the specified Orcamento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $orcamento = $this->orcamentoRepository->findWithoutFail($id);

        if (empty($orcamento)) {
            Flash::error('Orcamento not found');

            return redirect(route('orcamentos.index'));
        }

        $this->orcamentoRepository->delete($id);

        Flash::success('Orcamento deleted successfully.');

        return redirect(route('orcamentos.index'));
    }
}

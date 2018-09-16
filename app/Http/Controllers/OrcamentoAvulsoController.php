<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrcamentoAvulsoRequest;
use App\Http\Requests\UpdateOrcamentoAvulsoRequest;
use App\Repositories\OrcamentoAvulsoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class OrcamentoAvulsoController extends AppBaseController
{
    /** @var  OrcamentoAvulsoRepository */
    private $orcamentoAvulsoRepository;

    public function __construct(OrcamentoAvulsoRepository $orcamentoAvulsoRepo)
    {
        $this->orcamentoAvulsoRepository = $orcamentoAvulsoRepo;
    }

    /**
     * Display a listing of the OrcamentoAvulso.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->orcamentoAvulsoRepository->pushCriteria(new RequestCriteria($request));
        $orcamentoAvulsos = $this->orcamentoAvulsoRepository->paginate(10);

        return view('orcamento_avulsos.index')
            ->with('orcamentoAvulsos', $orcamentoAvulsos);
    }

    /**
     * Show the form for creating a new OrcamentoAvulso.
     *
     * @return Response
     */
    public function create()
    {
        return view('orcamento_avulsos.create');
    }

    /**
     * Store a newly created OrcamentoAvulso in storage.
     *
     * @param CreateOrcamentoAvulsoRequest $request
     *
     * @return Response
     */
    public function store(CreateOrcamentoAvulsoRequest $request)
    {
        $input = $request->all();

        $orcamentoAvulso = $this->orcamentoAvulsoRepository->create($input);

        Flash::success('Orcamento Avulso saved successfully.');

        return redirect(route('orcamentoAvulsos.index'));
    }

    /**
     * Display the specified OrcamentoAvulso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $orcamentoAvulso = $this->orcamentoAvulsoRepository->findWithoutFail($id);

        if (empty($orcamentoAvulso)) {
            Flash::error('Orcamento Avulso not found');

            return redirect(route('orcamentoAvulsos.index'));
        }

        return view('orcamento_avulsos.show')->with('orcamentoAvulso', $orcamentoAvulso);
    }

    /**
     * Show the form for editing the specified OrcamentoAvulso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $orcamentoAvulso = $this->orcamentoAvulsoRepository->findWithoutFail($id);

        if (empty($orcamentoAvulso)) {
            Flash::error('Orcamento Avulso not found');

            return redirect(route('orcamentoAvulsos.index'));
        }

        return view('orcamento_avulsos.edit')->with('orcamentoAvulso', $orcamentoAvulso);
    }

    /**
     * Update the specified OrcamentoAvulso in storage.
     *
     * @param  int              $id
     * @param UpdateOrcamentoAvulsoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrcamentoAvulsoRequest $request)
    {
        $orcamentoAvulso = $this->orcamentoAvulsoRepository->findWithoutFail($id);

        if (empty($orcamentoAvulso)) {
            Flash::error('Orcamento Avulso not found');

            return redirect(route('orcamentoAvulsos.index'));
        }

        $orcamentoAvulso = $this->orcamentoAvulsoRepository->update($request->all(), $id);

        Flash::success('Orcamento Avulso updated successfully.');

        return redirect(route('orcamentoAvulsos.index'));
    }

    /**
     * Remove the specified OrcamentoAvulso from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $orcamentoAvulso = $this->orcamentoAvulsoRepository->findWithoutFail($id);

        if (empty($orcamentoAvulso)) {
            Flash::error('Orcamento Avulso not found');

            return redirect(route('orcamentoAvulsos.index'));
        }

        $this->orcamentoAvulsoRepository->delete($id);

        Flash::success('Orcamento Avulso deleted successfully.');

        return redirect(route('orcamentoAvulsos.index'));
    }
}

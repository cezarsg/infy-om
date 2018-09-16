<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGrauServicoRequest;
use App\Http\Requests\UpdateGrauServicoRequest;
use App\Repositories\GrauServicoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class GrauServicoController extends AppBaseController
{
    /** @var  GrauServicoRepository */
    private $grauServicoRepository;

    public function __construct(GrauServicoRepository $grauServicoRepo)
    {
        $this->grauServicoRepository = $grauServicoRepo;
    }

    /**
     * Display a listing of the GrauServico.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->grauServicoRepository->pushCriteria(new RequestCriteria($request));
        $grauServicos = $this->grauServicoRepository->paginate(10);

        return view('grau_servicos.index')
            ->with('grauServicos', $grauServicos);
    }

    /**
     * Show the form for creating a new GrauServico.
     *
     * @return Response
     */
    public function create()
    {
        return view('grau_servicos.create');
    }

    /**
     * Store a newly created GrauServico in storage.
     *
     * @param CreateGrauServicoRequest $request
     *
     * @return Response
     */
    public function store(CreateGrauServicoRequest $request)
    {
        $input = $request->all();

        $grauServico = $this->grauServicoRepository->create($input);

        Flash::success('Grau Servico saved successfully.');

        return redirect(route('grauServicos.index'));
    }

    /**
     * Display the specified GrauServico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $grauServico = $this->grauServicoRepository->findWithoutFail($id);

        if (empty($grauServico)) {
            Flash::error('Grau Servico not found');

            return redirect(route('grauServicos.index'));
        }

        return view('grau_servicos.show')->with('grauServico', $grauServico);
    }

    /**
     * Show the form for editing the specified GrauServico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $grauServico = $this->grauServicoRepository->findWithoutFail($id);

        if (empty($grauServico)) {
            Flash::error('Grau Servico not found');

            return redirect(route('grauServicos.index'));
        }

        return view('grau_servicos.edit')->with('grauServico', $grauServico);
    }

    /**
     * Update the specified GrauServico in storage.
     *
     * @param  int              $id
     * @param UpdateGrauServicoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGrauServicoRequest $request)
    {
        $grauServico = $this->grauServicoRepository->findWithoutFail($id);

        if (empty($grauServico)) {
            Flash::error('Grau Servico not found');

            return redirect(route('grauServicos.index'));
        }

        $grauServico = $this->grauServicoRepository->update($request->all(), $id);

        Flash::success('Grau Servico updated successfully.');

        return redirect(route('grauServicos.index'));
    }

    /**
     * Remove the specified GrauServico from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $grauServico = $this->grauServicoRepository->findWithoutFail($id);

        if (empty($grauServico)) {
            Flash::error('Grau Servico not found');

            return redirect(route('grauServicos.index'));
        }

        $this->grauServicoRepository->delete($id);

        Flash::success('Grau Servico deleted successfully.');

        return redirect(route('grauServicos.index'));
    }
}

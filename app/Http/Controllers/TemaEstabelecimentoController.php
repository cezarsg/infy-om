<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTemaEstabelecimentoRequest;
use App\Http\Requests\UpdateTemaEstabelecimentoRequest;
use App\Repositories\TemaEstabelecimentoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TemaEstabelecimentoController extends AppBaseController
{
    /** @var  TemaEstabelecimentoRepository */
    private $temaEstabelecimentoRepository;

    public function __construct(TemaEstabelecimentoRepository $temaEstabelecimentoRepo)
    {
        $this->temaEstabelecimentoRepository = $temaEstabelecimentoRepo;
    }

    /**
     * Display a listing of the TemaEstabelecimento.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->temaEstabelecimentoRepository->pushCriteria(new RequestCriteria($request));
        $temaEstabelecimentos = $this->temaEstabelecimentoRepository->paginate(10);

        return view('tema_estabelecimentos.index')
            ->with('temaEstabelecimentos', $temaEstabelecimentos);
    }

    /**
     * Show the form for creating a new TemaEstabelecimento.
     *
     * @return Response
     */
    public function create()
    {
        return view('tema_estabelecimentos.create');
    }

    /**
     * Store a newly created TemaEstabelecimento in storage.
     *
     * @param CreateTemaEstabelecimentoRequest $request
     *
     * @return Response
     */
    public function store(CreateTemaEstabelecimentoRequest $request)
    {
        $input = $request->all();

        $temaEstabelecimento = $this->temaEstabelecimentoRepository->create($input);

        Flash::success('Tema Estabelecimento saved successfully.');

        return redirect(route('temaEstabelecimentos.index'));
    }

    /**
     * Display the specified TemaEstabelecimento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $temaEstabelecimento = $this->temaEstabelecimentoRepository->findWithoutFail($id);

        if (empty($temaEstabelecimento)) {
            Flash::error('Tema Estabelecimento not found');

            return redirect(route('temaEstabelecimentos.index'));
        }

        return view('tema_estabelecimentos.show')->with('temaEstabelecimento', $temaEstabelecimento);
    }

    /**
     * Show the form for editing the specified TemaEstabelecimento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $temaEstabelecimento = $this->temaEstabelecimentoRepository->findWithoutFail($id);

        if (empty($temaEstabelecimento)) {
            Flash::error('Tema Estabelecimento not found');

            return redirect(route('temaEstabelecimentos.index'));
        }

        return view('tema_estabelecimentos.edit')->with('temaEstabelecimento', $temaEstabelecimento);
    }

    /**
     * Update the specified TemaEstabelecimento in storage.
     *
     * @param  int              $id
     * @param UpdateTemaEstabelecimentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTemaEstabelecimentoRequest $request)
    {
        $temaEstabelecimento = $this->temaEstabelecimentoRepository->findWithoutFail($id);

        if (empty($temaEstabelecimento)) {
            Flash::error('Tema Estabelecimento not found');

            return redirect(route('temaEstabelecimentos.index'));
        }

        $temaEstabelecimento = $this->temaEstabelecimentoRepository->update($request->all(), $id);

        Flash::success('Tema Estabelecimento updated successfully.');

        return redirect(route('temaEstabelecimentos.index'));
    }

    /**
     * Remove the specified TemaEstabelecimento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $temaEstabelecimento = $this->temaEstabelecimentoRepository->findWithoutFail($id);

        if (empty($temaEstabelecimento)) {
            Flash::error('Tema Estabelecimento not found');

            return redirect(route('temaEstabelecimentos.index'));
        }

        $this->temaEstabelecimentoRepository->delete($id);

        Flash::success('Tema Estabelecimento deleted successfully.');

        return redirect(route('temaEstabelecimentos.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnuncianteTemaEstabelecimentoRequest;
use App\Http\Requests\UpdateAnuncianteTemaEstabelecimentoRequest;
use App\Repositories\AnuncianteTemaEstabelecimentoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AnuncianteTemaEstabelecimentoController extends AppBaseController
{
    /** @var  AnuncianteTemaEstabelecimentoRepository */
    private $anuncianteTemaEstabelecimentoRepository;

    public function __construct(AnuncianteTemaEstabelecimentoRepository $anuncianteTemaEstabelecimentoRepo)
    {
        $this->anuncianteTemaEstabelecimentoRepository = $anuncianteTemaEstabelecimentoRepo;
    }

    /**
     * Display a listing of the AnuncianteTemaEstabelecimento.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncianteTemaEstabelecimentoRepository->pushCriteria(new RequestCriteria($request));
        $anuncianteTemaEstabelecimentos = $this->anuncianteTemaEstabelecimentoRepository->paginate(10);

        return view('anunciante_tema_estabelecimentos.index')
            ->with('anuncianteTemaEstabelecimentos', $anuncianteTemaEstabelecimentos);
    }

    /**
     * Show the form for creating a new AnuncianteTemaEstabelecimento.
     *
     * @return Response
     */
    public function create()
    {
        return view('anunciante_tema_estabelecimentos.create');
    }

    /**
     * Store a newly created AnuncianteTemaEstabelecimento in storage.
     *
     * @param CreateAnuncianteTemaEstabelecimentoRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncianteTemaEstabelecimentoRequest $request)
    {
        $input = $request->all();

        $anuncianteTemaEstabelecimento = $this->anuncianteTemaEstabelecimentoRepository->create($input);

        Flash::success('Anunciante Tema Estabelecimento saved successfully.');

        return redirect(route('anuncianteTemaEstabelecimentos.index'));
    }

    /**
     * Display the specified AnuncianteTemaEstabelecimento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $anuncianteTemaEstabelecimento = $this->anuncianteTemaEstabelecimentoRepository->findWithoutFail($id);

        if (empty($anuncianteTemaEstabelecimento)) {
            Flash::error('Anunciante Tema Estabelecimento not found');

            return redirect(route('anuncianteTemaEstabelecimentos.index'));
        }

        return view('anunciante_tema_estabelecimentos.show')->with('anuncianteTemaEstabelecimento', $anuncianteTemaEstabelecimento);
    }

    /**
     * Show the form for editing the specified AnuncianteTemaEstabelecimento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $anuncianteTemaEstabelecimento = $this->anuncianteTemaEstabelecimentoRepository->findWithoutFail($id);

        if (empty($anuncianteTemaEstabelecimento)) {
            Flash::error('Anunciante Tema Estabelecimento not found');

            return redirect(route('anuncianteTemaEstabelecimentos.index'));
        }

        return view('anunciante_tema_estabelecimentos.edit')->with('anuncianteTemaEstabelecimento', $anuncianteTemaEstabelecimento);
    }

    /**
     * Update the specified AnuncianteTemaEstabelecimento in storage.
     *
     * @param  int              $id
     * @param UpdateAnuncianteTemaEstabelecimentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncianteTemaEstabelecimentoRequest $request)
    {
        $anuncianteTemaEstabelecimento = $this->anuncianteTemaEstabelecimentoRepository->findWithoutFail($id);

        if (empty($anuncianteTemaEstabelecimento)) {
            Flash::error('Anunciante Tema Estabelecimento not found');

            return redirect(route('anuncianteTemaEstabelecimentos.index'));
        }

        $anuncianteTemaEstabelecimento = $this->anuncianteTemaEstabelecimentoRepository->update($request->all(), $id);

        Flash::success('Anunciante Tema Estabelecimento updated successfully.');

        return redirect(route('anuncianteTemaEstabelecimentos.index'));
    }

    /**
     * Remove the specified AnuncianteTemaEstabelecimento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $anuncianteTemaEstabelecimento = $this->anuncianteTemaEstabelecimentoRepository->findWithoutFail($id);

        if (empty($anuncianteTemaEstabelecimento)) {
            Flash::error('Anunciante Tema Estabelecimento not found');

            return redirect(route('anuncianteTemaEstabelecimentos.index'));
        }

        $this->anuncianteTemaEstabelecimentoRepository->delete($id);

        Flash::success('Anunciante Tema Estabelecimento deleted successfully.');

        return redirect(route('anuncianteTemaEstabelecimentos.index'));
    }
}

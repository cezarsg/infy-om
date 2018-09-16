<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnuncioTemaEstabelecimentoRequest;
use App\Http\Requests\UpdateAnuncioTemaEstabelecimentoRequest;
use App\Repositories\AnuncioTemaEstabelecimentoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AnuncioTemaEstabelecimentoController extends AppBaseController
{
    /** @var  AnuncioTemaEstabelecimentoRepository */
    private $anuncioTemaEstabelecimentoRepository;

    public function __construct(AnuncioTemaEstabelecimentoRepository $anuncioTemaEstabelecimentoRepo)
    {
        $this->anuncioTemaEstabelecimentoRepository = $anuncioTemaEstabelecimentoRepo;
    }

    /**
     * Display a listing of the AnuncioTemaEstabelecimento.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncioTemaEstabelecimentoRepository->pushCriteria(new RequestCriteria($request));
        $anuncioTemaEstabelecimentos = $this->anuncioTemaEstabelecimentoRepository->paginate(10);

        return view('anuncio_tema_estabelecimentos.index')
            ->with('anuncioTemaEstabelecimentos', $anuncioTemaEstabelecimentos);
    }

    /**
     * Show the form for creating a new AnuncioTemaEstabelecimento.
     *
     * @return Response
     */
    public function create()
    {
        return view('anuncio_tema_estabelecimentos.create');
    }

    /**
     * Store a newly created AnuncioTemaEstabelecimento in storage.
     *
     * @param CreateAnuncioTemaEstabelecimentoRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncioTemaEstabelecimentoRequest $request)
    {
        $input = $request->all();

        $anuncioTemaEstabelecimento = $this->anuncioTemaEstabelecimentoRepository->create($input);

        Flash::success('Anuncio Tema Estabelecimento saved successfully.');

        return redirect(route('anuncioTemaEstabelecimentos.index'));
    }

    /**
     * Display the specified AnuncioTemaEstabelecimento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $anuncioTemaEstabelecimento = $this->anuncioTemaEstabelecimentoRepository->findWithoutFail($id);

        if (empty($anuncioTemaEstabelecimento)) {
            Flash::error('Anuncio Tema Estabelecimento not found');

            return redirect(route('anuncioTemaEstabelecimentos.index'));
        }

        return view('anuncio_tema_estabelecimentos.show')->with('anuncioTemaEstabelecimento', $anuncioTemaEstabelecimento);
    }

    /**
     * Show the form for editing the specified AnuncioTemaEstabelecimento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $anuncioTemaEstabelecimento = $this->anuncioTemaEstabelecimentoRepository->findWithoutFail($id);

        if (empty($anuncioTemaEstabelecimento)) {
            Flash::error('Anuncio Tema Estabelecimento not found');

            return redirect(route('anuncioTemaEstabelecimentos.index'));
        }

        return view('anuncio_tema_estabelecimentos.edit')->with('anuncioTemaEstabelecimento', $anuncioTemaEstabelecimento);
    }

    /**
     * Update the specified AnuncioTemaEstabelecimento in storage.
     *
     * @param  int              $id
     * @param UpdateAnuncioTemaEstabelecimentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncioTemaEstabelecimentoRequest $request)
    {
        $anuncioTemaEstabelecimento = $this->anuncioTemaEstabelecimentoRepository->findWithoutFail($id);

        if (empty($anuncioTemaEstabelecimento)) {
            Flash::error('Anuncio Tema Estabelecimento not found');

            return redirect(route('anuncioTemaEstabelecimentos.index'));
        }

        $anuncioTemaEstabelecimento = $this->anuncioTemaEstabelecimentoRepository->update($request->all(), $id);

        Flash::success('Anuncio Tema Estabelecimento updated successfully.');

        return redirect(route('anuncioTemaEstabelecimentos.index'));
    }

    /**
     * Remove the specified AnuncioTemaEstabelecimento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $anuncioTemaEstabelecimento = $this->anuncioTemaEstabelecimentoRepository->findWithoutFail($id);

        if (empty($anuncioTemaEstabelecimento)) {
            Flash::error('Anuncio Tema Estabelecimento not found');

            return redirect(route('anuncioTemaEstabelecimentos.index'));
        }

        $this->anuncioTemaEstabelecimentoRepository->delete($id);

        Flash::success('Anuncio Tema Estabelecimento deleted successfully.');

        return redirect(route('anuncioTemaEstabelecimentos.index'));
    }
}

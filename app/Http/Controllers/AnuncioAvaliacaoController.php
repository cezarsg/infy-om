<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnuncioAvaliacaoRequest;
use App\Http\Requests\UpdateAnuncioAvaliacaoRequest;
use App\Repositories\AnuncioAvaliacaoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AnuncioAvaliacaoController extends AppBaseController
{
    /** @var  AnuncioAvaliacaoRepository */
    private $anuncioAvaliacaoRepository;

    public function __construct(AnuncioAvaliacaoRepository $anuncioAvaliacaoRepo)
    {
        $this->anuncioAvaliacaoRepository = $anuncioAvaliacaoRepo;
    }

    /**
     * Display a listing of the AnuncioAvaliacao.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncioAvaliacaoRepository->pushCriteria(new RequestCriteria($request));
        $anuncioAvaliacaos = $this->anuncioAvaliacaoRepository->paginate(10);

        return view('anuncio_avaliacaos.index')
            ->with('anuncioAvaliacaos', $anuncioAvaliacaos);
    }

    /**
     * Show the form for creating a new AnuncioAvaliacao.
     *
     * @return Response
     */
    public function create()
    {
        return view('anuncio_avaliacaos.create');
    }

    /**
     * Store a newly created AnuncioAvaliacao in storage.
     *
     * @param CreateAnuncioAvaliacaoRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncioAvaliacaoRequest $request)
    {
        $input = $request->all();

        $anuncioAvaliacao = $this->anuncioAvaliacaoRepository->create($input);

        Flash::success('Anuncio Avaliacao saved successfully.');

        return redirect(route('anuncioAvaliacaos.index'));
    }

    /**
     * Display the specified AnuncioAvaliacao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $anuncioAvaliacao = $this->anuncioAvaliacaoRepository->findWithoutFail($id);

        if (empty($anuncioAvaliacao)) {
            Flash::error('Anuncio Avaliacao not found');

            return redirect(route('anuncioAvaliacaos.index'));
        }

        return view('anuncio_avaliacaos.show')->with('anuncioAvaliacao', $anuncioAvaliacao);
    }

    /**
     * Show the form for editing the specified AnuncioAvaliacao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $anuncioAvaliacao = $this->anuncioAvaliacaoRepository->findWithoutFail($id);

        if (empty($anuncioAvaliacao)) {
            Flash::error('Anuncio Avaliacao not found');

            return redirect(route('anuncioAvaliacaos.index'));
        }

        return view('anuncio_avaliacaos.edit')->with('anuncioAvaliacao', $anuncioAvaliacao);
    }

    /**
     * Update the specified AnuncioAvaliacao in storage.
     *
     * @param  int              $id
     * @param UpdateAnuncioAvaliacaoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncioAvaliacaoRequest $request)
    {
        $anuncioAvaliacao = $this->anuncioAvaliacaoRepository->findWithoutFail($id);

        if (empty($anuncioAvaliacao)) {
            Flash::error('Anuncio Avaliacao not found');

            return redirect(route('anuncioAvaliacaos.index'));
        }

        $anuncioAvaliacao = $this->anuncioAvaliacaoRepository->update($request->all(), $id);

        Flash::success('Anuncio Avaliacao updated successfully.');

        return redirect(route('anuncioAvaliacaos.index'));
    }

    /**
     * Remove the specified AnuncioAvaliacao from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $anuncioAvaliacao = $this->anuncioAvaliacaoRepository->findWithoutFail($id);

        if (empty($anuncioAvaliacao)) {
            Flash::error('Anuncio Avaliacao not found');

            return redirect(route('anuncioAvaliacaos.index'));
        }

        $this->anuncioAvaliacaoRepository->delete($id);

        Flash::success('Anuncio Avaliacao deleted successfully.');

        return redirect(route('anuncioAvaliacaos.index'));
    }
}

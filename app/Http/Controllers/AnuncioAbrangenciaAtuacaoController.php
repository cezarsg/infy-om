<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnuncioAbrangenciaAtuacaoRequest;
use App\Http\Requests\UpdateAnuncioAbrangenciaAtuacaoRequest;
use App\Repositories\AnuncioAbrangenciaAtuacaoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AnuncioAbrangenciaAtuacaoController extends AppBaseController
{
    /** @var  AnuncioAbrangenciaAtuacaoRepository */
    private $anuncioAbrangenciaAtuacaoRepository;

    public function __construct(AnuncioAbrangenciaAtuacaoRepository $anuncioAbrangenciaAtuacaoRepo)
    {
        $this->anuncioAbrangenciaAtuacaoRepository = $anuncioAbrangenciaAtuacaoRepo;
    }

    /**
     * Display a listing of the AnuncioAbrangenciaAtuacao.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncioAbrangenciaAtuacaoRepository->pushCriteria(new RequestCriteria($request));
        $anuncioAbrangenciaAtuacaos = $this->anuncioAbrangenciaAtuacaoRepository->paginate(10);

        return view('anuncio_abrangencia_atuacaos.index')
            ->with('anuncioAbrangenciaAtuacaos', $anuncioAbrangenciaAtuacaos);
    }

    /**
     * Show the form for creating a new AnuncioAbrangenciaAtuacao.
     *
     * @return Response
     */
    public function create()
    {
        return view('anuncio_abrangencia_atuacaos.create');
    }

    /**
     * Store a newly created AnuncioAbrangenciaAtuacao in storage.
     *
     * @param CreateAnuncioAbrangenciaAtuacaoRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncioAbrangenciaAtuacaoRequest $request)
    {
        $input = $request->all();

        $anuncioAbrangenciaAtuacao = $this->anuncioAbrangenciaAtuacaoRepository->create($input);

        Flash::success('Anuncio Abrangencia Atuacao saved successfully.');

        return redirect(route('anuncioAbrangenciaAtuacaos.index'));
    }

    /**
     * Display the specified AnuncioAbrangenciaAtuacao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $anuncioAbrangenciaAtuacao = $this->anuncioAbrangenciaAtuacaoRepository->findWithoutFail($id);

        if (empty($anuncioAbrangenciaAtuacao)) {
            Flash::error('Anuncio Abrangencia Atuacao not found');

            return redirect(route('anuncioAbrangenciaAtuacaos.index'));
        }

        return view('anuncio_abrangencia_atuacaos.show')->with('anuncioAbrangenciaAtuacao', $anuncioAbrangenciaAtuacao);
    }

    /**
     * Show the form for editing the specified AnuncioAbrangenciaAtuacao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $anuncioAbrangenciaAtuacao = $this->anuncioAbrangenciaAtuacaoRepository->findWithoutFail($id);

        if (empty($anuncioAbrangenciaAtuacao)) {
            Flash::error('Anuncio Abrangencia Atuacao not found');

            return redirect(route('anuncioAbrangenciaAtuacaos.index'));
        }

        return view('anuncio_abrangencia_atuacaos.edit')->with('anuncioAbrangenciaAtuacao', $anuncioAbrangenciaAtuacao);
    }

    /**
     * Update the specified AnuncioAbrangenciaAtuacao in storage.
     *
     * @param  int              $id
     * @param UpdateAnuncioAbrangenciaAtuacaoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncioAbrangenciaAtuacaoRequest $request)
    {
        $anuncioAbrangenciaAtuacao = $this->anuncioAbrangenciaAtuacaoRepository->findWithoutFail($id);

        if (empty($anuncioAbrangenciaAtuacao)) {
            Flash::error('Anuncio Abrangencia Atuacao not found');

            return redirect(route('anuncioAbrangenciaAtuacaos.index'));
        }

        $anuncioAbrangenciaAtuacao = $this->anuncioAbrangenciaAtuacaoRepository->update($request->all(), $id);

        Flash::success('Anuncio Abrangencia Atuacao updated successfully.');

        return redirect(route('anuncioAbrangenciaAtuacaos.index'));
    }

    /**
     * Remove the specified AnuncioAbrangenciaAtuacao from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $anuncioAbrangenciaAtuacao = $this->anuncioAbrangenciaAtuacaoRepository->findWithoutFail($id);

        if (empty($anuncioAbrangenciaAtuacao)) {
            Flash::error('Anuncio Abrangencia Atuacao not found');

            return redirect(route('anuncioAbrangenciaAtuacaos.index'));
        }

        $this->anuncioAbrangenciaAtuacaoRepository->delete($id);

        Flash::success('Anuncio Abrangencia Atuacao deleted successfully.');

        return redirect(route('anuncioAbrangenciaAtuacaos.index'));
    }
}

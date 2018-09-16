<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnuncioDiaPromocoesRequest;
use App\Http\Requests\UpdateAnuncioDiaPromocoesRequest;
use App\Repositories\AnuncioDiaPromocoesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AnuncioDiaPromocoesController extends AppBaseController
{
    /** @var  AnuncioDiaPromocoesRepository */
    private $anuncioDiaPromocoesRepository;

    public function __construct(AnuncioDiaPromocoesRepository $anuncioDiaPromocoesRepo)
    {
        $this->anuncioDiaPromocoesRepository = $anuncioDiaPromocoesRepo;
    }

    /**
     * Display a listing of the AnuncioDiaPromocoes.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncioDiaPromocoesRepository->pushCriteria(new RequestCriteria($request));
        $anuncioDiaPromocoes = $this->anuncioDiaPromocoesRepository->paginate(10);

        return view('anuncio_dia_promocoes.index')
            ->with('anuncioDiaPromocoes', $anuncioDiaPromocoes);
    }

    /**
     * Show the form for creating a new AnuncioDiaPromocoes.
     *
     * @return Response
     */
    public function create()
    {
        return view('anuncio_dia_promocoes.create');
    }

    /**
     * Store a newly created AnuncioDiaPromocoes in storage.
     *
     * @param CreateAnuncioDiaPromocoesRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncioDiaPromocoesRequest $request)
    {
        $input = $request->all();

        $anuncioDiaPromocoes = $this->anuncioDiaPromocoesRepository->create($input);

        Flash::success('Anuncio Dia Promocoes saved successfully.');

        return redirect(route('anuncioDiaPromocoes.index'));
    }

    /**
     * Display the specified AnuncioDiaPromocoes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $anuncioDiaPromocoes = $this->anuncioDiaPromocoesRepository->findWithoutFail($id);

        if (empty($anuncioDiaPromocoes)) {
            Flash::error('Anuncio Dia Promocoes not found');

            return redirect(route('anuncioDiaPromocoes.index'));
        }

        return view('anuncio_dia_promocoes.show')->with('anuncioDiaPromocoes', $anuncioDiaPromocoes);
    }

    /**
     * Show the form for editing the specified AnuncioDiaPromocoes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $anuncioDiaPromocoes = $this->anuncioDiaPromocoesRepository->findWithoutFail($id);

        if (empty($anuncioDiaPromocoes)) {
            Flash::error('Anuncio Dia Promocoes not found');

            return redirect(route('anuncioDiaPromocoes.index'));
        }

        return view('anuncio_dia_promocoes.edit')->with('anuncioDiaPromocoes', $anuncioDiaPromocoes);
    }

    /**
     * Update the specified AnuncioDiaPromocoes in storage.
     *
     * @param  int              $id
     * @param UpdateAnuncioDiaPromocoesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncioDiaPromocoesRequest $request)
    {
        $anuncioDiaPromocoes = $this->anuncioDiaPromocoesRepository->findWithoutFail($id);

        if (empty($anuncioDiaPromocoes)) {
            Flash::error('Anuncio Dia Promocoes not found');

            return redirect(route('anuncioDiaPromocoes.index'));
        }

        $anuncioDiaPromocoes = $this->anuncioDiaPromocoesRepository->update($request->all(), $id);

        Flash::success('Anuncio Dia Promocoes updated successfully.');

        return redirect(route('anuncioDiaPromocoes.index'));
    }

    /**
     * Remove the specified AnuncioDiaPromocoes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $anuncioDiaPromocoes = $this->anuncioDiaPromocoesRepository->findWithoutFail($id);

        if (empty($anuncioDiaPromocoes)) {
            Flash::error('Anuncio Dia Promocoes not found');

            return redirect(route('anuncioDiaPromocoes.index'));
        }

        $this->anuncioDiaPromocoesRepository->delete($id);

        Flash::success('Anuncio Dia Promocoes deleted successfully.');

        return redirect(route('anuncioDiaPromocoes.index'));
    }
}

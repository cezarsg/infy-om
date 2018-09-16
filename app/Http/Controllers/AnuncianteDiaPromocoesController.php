<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnuncianteDiaPromocoesRequest;
use App\Http\Requests\UpdateAnuncianteDiaPromocoesRequest;
use App\Repositories\AnuncianteDiaPromocoesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AnuncianteDiaPromocoesController extends AppBaseController
{
    /** @var  AnuncianteDiaPromocoesRepository */
    private $anuncianteDiaPromocoesRepository;

    public function __construct(AnuncianteDiaPromocoesRepository $anuncianteDiaPromocoesRepo)
    {
        $this->anuncianteDiaPromocoesRepository = $anuncianteDiaPromocoesRepo;
    }

    /**
     * Display a listing of the AnuncianteDiaPromocoes.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncianteDiaPromocoesRepository->pushCriteria(new RequestCriteria($request));
        $anuncianteDiaPromocoes = $this->anuncianteDiaPromocoesRepository->paginate(10);

        return view('anunciante_dia_promocoes.index')
            ->with('anuncianteDiaPromocoes', $anuncianteDiaPromocoes);
    }

    /**
     * Show the form for creating a new AnuncianteDiaPromocoes.
     *
     * @return Response
     */
    public function create()
    {
        return view('anunciante_dia_promocoes.create');
    }

    /**
     * Store a newly created AnuncianteDiaPromocoes in storage.
     *
     * @param CreateAnuncianteDiaPromocoesRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncianteDiaPromocoesRequest $request)
    {
        $input = $request->all();

        $anuncianteDiaPromocoes = $this->anuncianteDiaPromocoesRepository->create($input);

        Flash::success('Anunciante Dia Promocoes saved successfully.');

        return redirect(route('anuncianteDiaPromocoes.index'));
    }

    /**
     * Display the specified AnuncianteDiaPromocoes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $anuncianteDiaPromocoes = $this->anuncianteDiaPromocoesRepository->findWithoutFail($id);

        if (empty($anuncianteDiaPromocoes)) {
            Flash::error('Anunciante Dia Promocoes not found');

            return redirect(route('anuncianteDiaPromocoes.index'));
        }

        return view('anunciante_dia_promocoes.show')->with('anuncianteDiaPromocoes', $anuncianteDiaPromocoes);
    }

    /**
     * Show the form for editing the specified AnuncianteDiaPromocoes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $anuncianteDiaPromocoes = $this->anuncianteDiaPromocoesRepository->findWithoutFail($id);

        if (empty($anuncianteDiaPromocoes)) {
            Flash::error('Anunciante Dia Promocoes not found');

            return redirect(route('anuncianteDiaPromocoes.index'));
        }

        return view('anunciante_dia_promocoes.edit')->with('anuncianteDiaPromocoes', $anuncianteDiaPromocoes);
    }

    /**
     * Update the specified AnuncianteDiaPromocoes in storage.
     *
     * @param  int              $id
     * @param UpdateAnuncianteDiaPromocoesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncianteDiaPromocoesRequest $request)
    {
        $anuncianteDiaPromocoes = $this->anuncianteDiaPromocoesRepository->findWithoutFail($id);

        if (empty($anuncianteDiaPromocoes)) {
            Flash::error('Anunciante Dia Promocoes not found');

            return redirect(route('anuncianteDiaPromocoes.index'));
        }

        $anuncianteDiaPromocoes = $this->anuncianteDiaPromocoesRepository->update($request->all(), $id);

        Flash::success('Anunciante Dia Promocoes updated successfully.');

        return redirect(route('anuncianteDiaPromocoes.index'));
    }

    /**
     * Remove the specified AnuncianteDiaPromocoes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $anuncianteDiaPromocoes = $this->anuncianteDiaPromocoesRepository->findWithoutFail($id);

        if (empty($anuncianteDiaPromocoes)) {
            Flash::error('Anunciante Dia Promocoes not found');

            return redirect(route('anuncianteDiaPromocoes.index'));
        }

        $this->anuncianteDiaPromocoesRepository->delete($id);

        Flash::success('Anunciante Dia Promocoes deleted successfully.');

        return redirect(route('anuncianteDiaPromocoes.index'));
    }
}

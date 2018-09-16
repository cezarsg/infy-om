<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnuncioPremiosRequest;
use App\Http\Requests\UpdateAnuncioPremiosRequest;
use App\Repositories\AnuncioPremiosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AnuncioPremiosController extends AppBaseController
{
    /** @var  AnuncioPremiosRepository */
    private $anuncioPremiosRepository;

    public function __construct(AnuncioPremiosRepository $anuncioPremiosRepo)
    {
        $this->anuncioPremiosRepository = $anuncioPremiosRepo;
    }

    /**
     * Display a listing of the AnuncioPremios.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncioPremiosRepository->pushCriteria(new RequestCriteria($request));
        $anuncioPremios = $this->anuncioPremiosRepository->paginate(10);

        return view('anuncio_premios.index')
            ->with('anuncioPremios', $anuncioPremios);
    }

    /**
     * Show the form for creating a new AnuncioPremios.
     *
     * @return Response
     */
    public function create()
    {
        return view('anuncio_premios.create');
    }

    /**
     * Store a newly created AnuncioPremios in storage.
     *
     * @param CreateAnuncioPremiosRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncioPremiosRequest $request)
    {
        $input = $request->all();

        $anuncioPremios = $this->anuncioPremiosRepository->create($input);

        Flash::success('Anuncio Premios saved successfully.');

        return redirect(route('anuncioPremios.index'));
    }

    /**
     * Display the specified AnuncioPremios.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $anuncioPremios = $this->anuncioPremiosRepository->findWithoutFail($id);

        if (empty($anuncioPremios)) {
            Flash::error('Anuncio Premios not found');

            return redirect(route('anuncioPremios.index'));
        }

        return view('anuncio_premios.show')->with('anuncioPremios', $anuncioPremios);
    }

    /**
     * Show the form for editing the specified AnuncioPremios.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $anuncioPremios = $this->anuncioPremiosRepository->findWithoutFail($id);

        if (empty($anuncioPremios)) {
            Flash::error('Anuncio Premios not found');

            return redirect(route('anuncioPremios.index'));
        }

        return view('anuncio_premios.edit')->with('anuncioPremios', $anuncioPremios);
    }

    /**
     * Update the specified AnuncioPremios in storage.
     *
     * @param  int              $id
     * @param UpdateAnuncioPremiosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncioPremiosRequest $request)
    {
        $anuncioPremios = $this->anuncioPremiosRepository->findWithoutFail($id);

        if (empty($anuncioPremios)) {
            Flash::error('Anuncio Premios not found');

            return redirect(route('anuncioPremios.index'));
        }

        $anuncioPremios = $this->anuncioPremiosRepository->update($request->all(), $id);

        Flash::success('Anuncio Premios updated successfully.');

        return redirect(route('anuncioPremios.index'));
    }

    /**
     * Remove the specified AnuncioPremios from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $anuncioPremios = $this->anuncioPremiosRepository->findWithoutFail($id);

        if (empty($anuncioPremios)) {
            Flash::error('Anuncio Premios not found');

            return redirect(route('anuncioPremios.index'));
        }

        $this->anuncioPremiosRepository->delete($id);

        Flash::success('Anuncio Premios deleted successfully.');

        return redirect(route('anuncioPremios.index'));
    }
}

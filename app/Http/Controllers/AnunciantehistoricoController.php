<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnunciantehistoricoRequest;
use App\Http\Requests\UpdateAnunciantehistoricoRequest;
use App\Repositories\AnunciantehistoricoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AnunciantehistoricoController extends AppBaseController
{
    /** @var  AnunciantehistoricoRepository */
    private $anunciantehistoricoRepository;

    public function __construct(AnunciantehistoricoRepository $anunciantehistoricoRepo)
    {
        $this->anunciantehistoricoRepository = $anunciantehistoricoRepo;
    }

    /**
     * Display a listing of the Anunciantehistorico.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anunciantehistoricoRepository->pushCriteria(new RequestCriteria($request));
        $anunciantehistoricos = $this->anunciantehistoricoRepository->paginate(10);

        return view('anunciantehistoricos.index')
            ->with('anunciantehistoricos', $anunciantehistoricos);
    }

    /**
     * Show the form for creating a new Anunciantehistorico.
     *
     * @return Response
     */
    public function create()
    {
        return view('anunciantehistoricos.create');
    }

    /**
     * Store a newly created Anunciantehistorico in storage.
     *
     * @param CreateAnunciantehistoricoRequest $request
     *
     * @return Response
     */
    public function store(CreateAnunciantehistoricoRequest $request)
    {
        $input = $request->all();

        $anunciantehistorico = $this->anunciantehistoricoRepository->create($input);

        Flash::success('Anunciantehistorico saved successfully.');

        return redirect(route('anunciantehistoricos.index'));
    }

    /**
     * Display the specified Anunciantehistorico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $anunciantehistorico = $this->anunciantehistoricoRepository->findWithoutFail($id);

        if (empty($anunciantehistorico)) {
            Flash::error('Anunciantehistorico not found');

            return redirect(route('anunciantehistoricos.index'));
        }

        return view('anunciantehistoricos.show')->with('anunciantehistorico', $anunciantehistorico);
    }

    /**
     * Show the form for editing the specified Anunciantehistorico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $anunciantehistorico = $this->anunciantehistoricoRepository->findWithoutFail($id);

        if (empty($anunciantehistorico)) {
            Flash::error('Anunciantehistorico not found');

            return redirect(route('anunciantehistoricos.index'));
        }

        return view('anunciantehistoricos.edit')->with('anunciantehistorico', $anunciantehistorico);
    }

    /**
     * Update the specified Anunciantehistorico in storage.
     *
     * @param  int              $id
     * @param UpdateAnunciantehistoricoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnunciantehistoricoRequest $request)
    {
        $anunciantehistorico = $this->anunciantehistoricoRepository->findWithoutFail($id);

        if (empty($anunciantehistorico)) {
            Flash::error('Anunciantehistorico not found');

            return redirect(route('anunciantehistoricos.index'));
        }

        $anunciantehistorico = $this->anunciantehistoricoRepository->update($request->all(), $id);

        Flash::success('Anunciantehistorico updated successfully.');

        return redirect(route('anunciantehistoricos.index'));
    }

    /**
     * Remove the specified Anunciantehistorico from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $anunciantehistorico = $this->anunciantehistoricoRepository->findWithoutFail($id);

        if (empty($anunciantehistorico)) {
            Flash::error('Anunciantehistorico not found');

            return redirect(route('anunciantehistoricos.index'));
        }

        $this->anunciantehistoricoRepository->delete($id);

        Flash::success('Anunciantehistorico deleted successfully.');

        return redirect(route('anunciantehistoricos.index'));
    }
}

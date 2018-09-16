<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEstiloMusicalRequest;
use App\Http\Requests\UpdateEstiloMusicalRequest;
use App\Repositories\EstiloMusicalRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EstiloMusicalController extends AppBaseController
{
    /** @var  EstiloMusicalRepository */
    private $estiloMusicalRepository;

    public function __construct(EstiloMusicalRepository $estiloMusicalRepo)
    {
        $this->estiloMusicalRepository = $estiloMusicalRepo;
    }

    /**
     * Display a listing of the EstiloMusical.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->estiloMusicalRepository->pushCriteria(new RequestCriteria($request));
        $estiloMusicals = $this->estiloMusicalRepository->paginate(10);

        return view('estilo_musicals.index')
            ->with('estiloMusicals', $estiloMusicals);
    }

    /**
     * Show the form for creating a new EstiloMusical.
     *
     * @return Response
     */
    public function create()
    {
        return view('estilo_musicals.create');
    }

    /**
     * Store a newly created EstiloMusical in storage.
     *
     * @param CreateEstiloMusicalRequest $request
     *
     * @return Response
     */
    public function store(CreateEstiloMusicalRequest $request)
    {
        $input = $request->all();

        $estiloMusical = $this->estiloMusicalRepository->create($input);

        Flash::success('Estilo Musical saved successfully.');

        return redirect(route('estiloMusicals.index'));
    }

    /**
     * Display the specified EstiloMusical.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estiloMusical = $this->estiloMusicalRepository->findWithoutFail($id);

        if (empty($estiloMusical)) {
            Flash::error('Estilo Musical not found');

            return redirect(route('estiloMusicals.index'));
        }

        return view('estilo_musicals.show')->with('estiloMusical', $estiloMusical);
    }

    /**
     * Show the form for editing the specified EstiloMusical.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estiloMusical = $this->estiloMusicalRepository->findWithoutFail($id);

        if (empty($estiloMusical)) {
            Flash::error('Estilo Musical not found');

            return redirect(route('estiloMusicals.index'));
        }

        return view('estilo_musicals.edit')->with('estiloMusical', $estiloMusical);
    }

    /**
     * Update the specified EstiloMusical in storage.
     *
     * @param  int              $id
     * @param UpdateEstiloMusicalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstiloMusicalRequest $request)
    {
        $estiloMusical = $this->estiloMusicalRepository->findWithoutFail($id);

        if (empty($estiloMusical)) {
            Flash::error('Estilo Musical not found');

            return redirect(route('estiloMusicals.index'));
        }

        $estiloMusical = $this->estiloMusicalRepository->update($request->all(), $id);

        Flash::success('Estilo Musical updated successfully.');

        return redirect(route('estiloMusicals.index'));
    }

    /**
     * Remove the specified EstiloMusical from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estiloMusical = $this->estiloMusicalRepository->findWithoutFail($id);

        if (empty($estiloMusical)) {
            Flash::error('Estilo Musical not found');

            return redirect(route('estiloMusicals.index'));
        }

        $this->estiloMusicalRepository->delete($id);

        Flash::success('Estilo Musical deleted successfully.');

        return redirect(route('estiloMusicals.index'));
    }
}

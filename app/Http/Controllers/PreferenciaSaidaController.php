<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePreferenciaSaidaRequest;
use App\Http\Requests\UpdatePreferenciaSaidaRequest;
use App\Repositories\PreferenciaSaidaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PreferenciaSaidaController extends AppBaseController
{
    /** @var  PreferenciaSaidaRepository */
    private $preferenciaSaidaRepository;

    public function __construct(PreferenciaSaidaRepository $preferenciaSaidaRepo)
    {
        $this->preferenciaSaidaRepository = $preferenciaSaidaRepo;
    }

    /**
     * Display a listing of the PreferenciaSaida.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->preferenciaSaidaRepository->pushCriteria(new RequestCriteria($request));
        $preferenciaSaidas = $this->preferenciaSaidaRepository->paginate(10);

        return view('preferencia_saidas.index')
            ->with('preferenciaSaidas', $preferenciaSaidas);
    }

    /**
     * Show the form for creating a new PreferenciaSaida.
     *
     * @return Response
     */
    public function create()
    {
        return view('preferencia_saidas.create');
    }

    /**
     * Store a newly created PreferenciaSaida in storage.
     *
     * @param CreatePreferenciaSaidaRequest $request
     *
     * @return Response
     */
    public function store(CreatePreferenciaSaidaRequest $request)
    {
        $input = $request->all();

        $preferenciaSaida = $this->preferenciaSaidaRepository->create($input);

        Flash::success('Preferencia Saida saved successfully.');

        return redirect(route('preferenciaSaidas.index'));
    }

    /**
     * Display the specified PreferenciaSaida.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $preferenciaSaida = $this->preferenciaSaidaRepository->findWithoutFail($id);

        if (empty($preferenciaSaida)) {
            Flash::error('Preferencia Saida not found');

            return redirect(route('preferenciaSaidas.index'));
        }

        return view('preferencia_saidas.show')->with('preferenciaSaida', $preferenciaSaida);
    }

    /**
     * Show the form for editing the specified PreferenciaSaida.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $preferenciaSaida = $this->preferenciaSaidaRepository->findWithoutFail($id);

        if (empty($preferenciaSaida)) {
            Flash::error('Preferencia Saida not found');

            return redirect(route('preferenciaSaidas.index'));
        }

        return view('preferencia_saidas.edit')->with('preferenciaSaida', $preferenciaSaida);
    }

    /**
     * Update the specified PreferenciaSaida in storage.
     *
     * @param  int              $id
     * @param UpdatePreferenciaSaidaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePreferenciaSaidaRequest $request)
    {
        $preferenciaSaida = $this->preferenciaSaidaRepository->findWithoutFail($id);

        if (empty($preferenciaSaida)) {
            Flash::error('Preferencia Saida not found');

            return redirect(route('preferenciaSaidas.index'));
        }

        $preferenciaSaida = $this->preferenciaSaidaRepository->update($request->all(), $id);

        Flash::success('Preferencia Saida updated successfully.');

        return redirect(route('preferenciaSaidas.index'));
    }

    /**
     * Remove the specified PreferenciaSaida from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $preferenciaSaida = $this->preferenciaSaidaRepository->findWithoutFail($id);

        if (empty($preferenciaSaida)) {
            Flash::error('Preferencia Saida not found');

            return redirect(route('preferenciaSaidas.index'));
        }

        $this->preferenciaSaidaRepository->delete($id);

        Flash::success('Preferencia Saida deleted successfully.');

        return redirect(route('preferenciaSaidas.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOpcaoCulinariaRequest;
use App\Http\Requests\UpdateOpcaoCulinariaRequest;
use App\Repositories\OpcaoCulinariaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class OpcaoCulinariaController extends AppBaseController
{
    /** @var  OpcaoCulinariaRepository */
    private $opcaoCulinariaRepository;

    public function __construct(OpcaoCulinariaRepository $opcaoCulinariaRepo)
    {
        $this->opcaoCulinariaRepository = $opcaoCulinariaRepo;
    }

    /**
     * Display a listing of the OpcaoCulinaria.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->opcaoCulinariaRepository->pushCriteria(new RequestCriteria($request));
        $opcaoCulinarias = $this->opcaoCulinariaRepository->paginate(10);

        return view('opcao_culinarias.index')
            ->with('opcaoCulinarias', $opcaoCulinarias);
    }

    /**
     * Show the form for creating a new OpcaoCulinaria.
     *
     * @return Response
     */
    public function create()
    {
        return view('opcao_culinarias.create');
    }

    /**
     * Store a newly created OpcaoCulinaria in storage.
     *
     * @param CreateOpcaoCulinariaRequest $request
     *
     * @return Response
     */
    public function store(CreateOpcaoCulinariaRequest $request)
    {
        $input = $request->all();

        $opcaoCulinaria = $this->opcaoCulinariaRepository->create($input);

        Flash::success('Opcao Culinaria saved successfully.');

        return redirect(route('opcaoCulinarias.index'));
    }

    /**
     * Display the specified OpcaoCulinaria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $opcaoCulinaria = $this->opcaoCulinariaRepository->findWithoutFail($id);

        if (empty($opcaoCulinaria)) {
            Flash::error('Opcao Culinaria not found');

            return redirect(route('opcaoCulinarias.index'));
        }

        return view('opcao_culinarias.show')->with('opcaoCulinaria', $opcaoCulinaria);
    }

    /**
     * Show the form for editing the specified OpcaoCulinaria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $opcaoCulinaria = $this->opcaoCulinariaRepository->findWithoutFail($id);

        if (empty($opcaoCulinaria)) {
            Flash::error('Opcao Culinaria not found');

            return redirect(route('opcaoCulinarias.index'));
        }

        return view('opcao_culinarias.edit')->with('opcaoCulinaria', $opcaoCulinaria);
    }

    /**
     * Update the specified OpcaoCulinaria in storage.
     *
     * @param  int              $id
     * @param UpdateOpcaoCulinariaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOpcaoCulinariaRequest $request)
    {
        $opcaoCulinaria = $this->opcaoCulinariaRepository->findWithoutFail($id);

        if (empty($opcaoCulinaria)) {
            Flash::error('Opcao Culinaria not found');

            return redirect(route('opcaoCulinarias.index'));
        }

        $opcaoCulinaria = $this->opcaoCulinariaRepository->update($request->all(), $id);

        Flash::success('Opcao Culinaria updated successfully.');

        return redirect(route('opcaoCulinarias.index'));
    }

    /**
     * Remove the specified OpcaoCulinaria from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $opcaoCulinaria = $this->opcaoCulinariaRepository->findWithoutFail($id);

        if (empty($opcaoCulinaria)) {
            Flash::error('Opcao Culinaria not found');

            return redirect(route('opcaoCulinarias.index'));
        }

        $this->opcaoCulinariaRepository->delete($id);

        Flash::success('Opcao Culinaria deleted successfully.');

        return redirect(route('opcaoCulinarias.index'));
    }
}

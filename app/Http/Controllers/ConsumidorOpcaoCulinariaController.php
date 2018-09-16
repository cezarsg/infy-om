<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConsumidorOpcaoCulinariaRequest;
use App\Http\Requests\UpdateConsumidorOpcaoCulinariaRequest;
use App\Repositories\ConsumidorOpcaoCulinariaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ConsumidorOpcaoCulinariaController extends AppBaseController
{
    /** @var  ConsumidorOpcaoCulinariaRepository */
    private $consumidorOpcaoCulinariaRepository;

    public function __construct(ConsumidorOpcaoCulinariaRepository $consumidorOpcaoCulinariaRepo)
    {
        $this->consumidorOpcaoCulinariaRepository = $consumidorOpcaoCulinariaRepo;
    }

    /**
     * Display a listing of the ConsumidorOpcaoCulinaria.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->consumidorOpcaoCulinariaRepository->pushCriteria(new RequestCriteria($request));
        $consumidorOpcaoCulinarias = $this->consumidorOpcaoCulinariaRepository->paginate(10);

        return view('consumidor_opcao_culinarias.index')
            ->with('consumidorOpcaoCulinarias', $consumidorOpcaoCulinarias);
    }

    /**
     * Show the form for creating a new ConsumidorOpcaoCulinaria.
     *
     * @return Response
     */
    public function create()
    {
        return view('consumidor_opcao_culinarias.create');
    }

    /**
     * Store a newly created ConsumidorOpcaoCulinaria in storage.
     *
     * @param CreateConsumidorOpcaoCulinariaRequest $request
     *
     * @return Response
     */
    public function store(CreateConsumidorOpcaoCulinariaRequest $request)
    {
        $input = $request->all();

        $consumidorOpcaoCulinaria = $this->consumidorOpcaoCulinariaRepository->create($input);

        Flash::success('Consumidor Opcao Culinaria saved successfully.');

        return redirect(route('consumidorOpcaoCulinarias.index'));
    }

    /**
     * Display the specified ConsumidorOpcaoCulinaria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $consumidorOpcaoCulinaria = $this->consumidorOpcaoCulinariaRepository->findWithoutFail($id);

        if (empty($consumidorOpcaoCulinaria)) {
            Flash::error('Consumidor Opcao Culinaria not found');

            return redirect(route('consumidorOpcaoCulinarias.index'));
        }

        return view('consumidor_opcao_culinarias.show')->with('consumidorOpcaoCulinaria', $consumidorOpcaoCulinaria);
    }

    /**
     * Show the form for editing the specified ConsumidorOpcaoCulinaria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $consumidorOpcaoCulinaria = $this->consumidorOpcaoCulinariaRepository->findWithoutFail($id);

        if (empty($consumidorOpcaoCulinaria)) {
            Flash::error('Consumidor Opcao Culinaria not found');

            return redirect(route('consumidorOpcaoCulinarias.index'));
        }

        return view('consumidor_opcao_culinarias.edit')->with('consumidorOpcaoCulinaria', $consumidorOpcaoCulinaria);
    }

    /**
     * Update the specified ConsumidorOpcaoCulinaria in storage.
     *
     * @param  int              $id
     * @param UpdateConsumidorOpcaoCulinariaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConsumidorOpcaoCulinariaRequest $request)
    {
        $consumidorOpcaoCulinaria = $this->consumidorOpcaoCulinariaRepository->findWithoutFail($id);

        if (empty($consumidorOpcaoCulinaria)) {
            Flash::error('Consumidor Opcao Culinaria not found');

            return redirect(route('consumidorOpcaoCulinarias.index'));
        }

        $consumidorOpcaoCulinaria = $this->consumidorOpcaoCulinariaRepository->update($request->all(), $id);

        Flash::success('Consumidor Opcao Culinaria updated successfully.');

        return redirect(route('consumidorOpcaoCulinarias.index'));
    }

    /**
     * Remove the specified ConsumidorOpcaoCulinaria from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $consumidorOpcaoCulinaria = $this->consumidorOpcaoCulinariaRepository->findWithoutFail($id);

        if (empty($consumidorOpcaoCulinaria)) {
            Flash::error('Consumidor Opcao Culinaria not found');

            return redirect(route('consumidorOpcaoCulinarias.index'));
        }

        $this->consumidorOpcaoCulinariaRepository->delete($id);

        Flash::success('Consumidor Opcao Culinaria deleted successfully.');

        return redirect(route('consumidorOpcaoCulinarias.index'));
    }
}

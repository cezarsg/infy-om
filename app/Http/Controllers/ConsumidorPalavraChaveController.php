<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConsumidorPalavraChaveRequest;
use App\Http\Requests\UpdateConsumidorPalavraChaveRequest;
use App\Repositories\ConsumidorPalavraChaveRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ConsumidorPalavraChaveController extends AppBaseController
{
    /** @var  ConsumidorPalavraChaveRepository */
    private $consumidorPalavraChaveRepository;

    public function __construct(ConsumidorPalavraChaveRepository $consumidorPalavraChaveRepo)
    {
        $this->consumidorPalavraChaveRepository = $consumidorPalavraChaveRepo;
    }

    /**
     * Display a listing of the ConsumidorPalavraChave.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->consumidorPalavraChaveRepository->pushCriteria(new RequestCriteria($request));
        $consumidorPalavraChaves = $this->consumidorPalavraChaveRepository->paginate(10);

        return view('consumidor_palavra_chaves.index')
            ->with('consumidorPalavraChaves', $consumidorPalavraChaves);
    }

    /**
     * Show the form for creating a new ConsumidorPalavraChave.
     *
     * @return Response
     */
    public function create()
    {
        return view('consumidor_palavra_chaves.create');
    }

    /**
     * Store a newly created ConsumidorPalavraChave in storage.
     *
     * @param CreateConsumidorPalavraChaveRequest $request
     *
     * @return Response
     */
    public function store(CreateConsumidorPalavraChaveRequest $request)
    {
        $input = $request->all();

        $consumidorPalavraChave = $this->consumidorPalavraChaveRepository->create($input);

        Flash::success('Consumidor Palavra Chave saved successfully.');

        return redirect(route('consumidorPalavraChaves.index'));
    }

    /**
     * Display the specified ConsumidorPalavraChave.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $consumidorPalavraChave = $this->consumidorPalavraChaveRepository->findWithoutFail($id);

        if (empty($consumidorPalavraChave)) {
            Flash::error('Consumidor Palavra Chave not found');

            return redirect(route('consumidorPalavraChaves.index'));
        }

        return view('consumidor_palavra_chaves.show')->with('consumidorPalavraChave', $consumidorPalavraChave);
    }

    /**
     * Show the form for editing the specified ConsumidorPalavraChave.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $consumidorPalavraChave = $this->consumidorPalavraChaveRepository->findWithoutFail($id);

        if (empty($consumidorPalavraChave)) {
            Flash::error('Consumidor Palavra Chave not found');

            return redirect(route('consumidorPalavraChaves.index'));
        }

        return view('consumidor_palavra_chaves.edit')->with('consumidorPalavraChave', $consumidorPalavraChave);
    }

    /**
     * Update the specified ConsumidorPalavraChave in storage.
     *
     * @param  int              $id
     * @param UpdateConsumidorPalavraChaveRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConsumidorPalavraChaveRequest $request)
    {
        $consumidorPalavraChave = $this->consumidorPalavraChaveRepository->findWithoutFail($id);

        if (empty($consumidorPalavraChave)) {
            Flash::error('Consumidor Palavra Chave not found');

            return redirect(route('consumidorPalavraChaves.index'));
        }

        $consumidorPalavraChave = $this->consumidorPalavraChaveRepository->update($request->all(), $id);

        Flash::success('Consumidor Palavra Chave updated successfully.');

        return redirect(route('consumidorPalavraChaves.index'));
    }

    /**
     * Remove the specified ConsumidorPalavraChave from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $consumidorPalavraChave = $this->consumidorPalavraChaveRepository->findWithoutFail($id);

        if (empty($consumidorPalavraChave)) {
            Flash::error('Consumidor Palavra Chave not found');

            return redirect(route('consumidorPalavraChaves.index'));
        }

        $this->consumidorPalavraChaveRepository->delete($id);

        Flash::success('Consumidor Palavra Chave deleted successfully.');

        return redirect(route('consumidorPalavraChaves.index'));
    }
}

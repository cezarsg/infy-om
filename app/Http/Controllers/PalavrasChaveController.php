<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePalavrasChaveRequest;
use App\Http\Requests\UpdatePalavrasChaveRequest;
use App\Repositories\PalavrasChaveRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PalavrasChaveController extends AppBaseController
{
    /** @var  PalavrasChaveRepository */
    private $palavrasChaveRepository;

    public function __construct(PalavrasChaveRepository $palavrasChaveRepo)
    {
        $this->palavrasChaveRepository = $palavrasChaveRepo;
    }

    /**
     * Display a listing of the PalavrasChave.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->palavrasChaveRepository->pushCriteria(new RequestCriteria($request));
        $palavrasChaves = $this->palavrasChaveRepository->paginate(10);

        return view('palavras_chaves.index')
            ->with('palavrasChaves', $palavrasChaves);
    }

    /**
     * Show the form for creating a new PalavrasChave.
     *
     * @return Response
     */
    public function create()
    {
        return view('palavras_chaves.create');
    }

    /**
     * Store a newly created PalavrasChave in storage.
     *
     * @param CreatePalavrasChaveRequest $request
     *
     * @return Response
     */
    public function store(CreatePalavrasChaveRequest $request)
    {
        $input = $request->all();

        $palavrasChave = $this->palavrasChaveRepository->create($input);

        Flash::success('Palavras Chave saved successfully.');

        return redirect(route('palavrasChaves.index'));
    }

    /**
     * Display the specified PalavrasChave.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $palavrasChave = $this->palavrasChaveRepository->findWithoutFail($id);

        if (empty($palavrasChave)) {
            Flash::error('Palavras Chave not found');

            return redirect(route('palavrasChaves.index'));
        }

        return view('palavras_chaves.show')->with('palavrasChave', $palavrasChave);
    }

    /**
     * Show the form for editing the specified PalavrasChave.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $palavrasChave = $this->palavrasChaveRepository->findWithoutFail($id);

        if (empty($palavrasChave)) {
            Flash::error('Palavras Chave not found');

            return redirect(route('palavrasChaves.index'));
        }

        return view('palavras_chaves.edit')->with('palavrasChave', $palavrasChave);
    }

    /**
     * Update the specified PalavrasChave in storage.
     *
     * @param  int              $id
     * @param UpdatePalavrasChaveRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePalavrasChaveRequest $request)
    {
        $palavrasChave = $this->palavrasChaveRepository->findWithoutFail($id);

        if (empty($palavrasChave)) {
            Flash::error('Palavras Chave not found');

            return redirect(route('palavrasChaves.index'));
        }

        $palavrasChave = $this->palavrasChaveRepository->update($request->all(), $id);

        Flash::success('Palavras Chave updated successfully.');

        return redirect(route('palavrasChaves.index'));
    }

    /**
     * Remove the specified PalavrasChave from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $palavrasChave = $this->palavrasChaveRepository->findWithoutFail($id);

        if (empty($palavrasChave)) {
            Flash::error('Palavras Chave not found');

            return redirect(route('palavrasChaves.index'));
        }

        $this->palavrasChaveRepository->delete($id);

        Flash::success('Palavras Chave deleted successfully.');

        return redirect(route('palavrasChaves.index'));
    }
}

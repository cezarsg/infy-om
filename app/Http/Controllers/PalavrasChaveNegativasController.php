<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePalavrasChaveNegativasRequest;
use App\Http\Requests\UpdatePalavrasChaveNegativasRequest;
use App\Repositories\PalavrasChaveNegativasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PalavrasChaveNegativasController extends AppBaseController
{
    /** @var  PalavrasChaveNegativasRepository */
    private $palavrasChaveNegativasRepository;

    public function __construct(PalavrasChaveNegativasRepository $palavrasChaveNegativasRepo)
    {
        $this->palavrasChaveNegativasRepository = $palavrasChaveNegativasRepo;
    }

    /**
     * Display a listing of the PalavrasChaveNegativas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->palavrasChaveNegativasRepository->pushCriteria(new RequestCriteria($request));
        $palavrasChaveNegativas = $this->palavrasChaveNegativasRepository->paginate(10);

        return view('palavras_chave_negativas.index')
            ->with('palavrasChaveNegativas', $palavrasChaveNegativas);
    }

    /**
     * Show the form for creating a new PalavrasChaveNegativas.
     *
     * @return Response
     */
    public function create()
    {
        return view('palavras_chave_negativas.create');
    }

    /**
     * Store a newly created PalavrasChaveNegativas in storage.
     *
     * @param CreatePalavrasChaveNegativasRequest $request
     *
     * @return Response
     */
    public function store(CreatePalavrasChaveNegativasRequest $request)
    {
        $input = $request->all();

        $palavrasChaveNegativas = $this->palavrasChaveNegativasRepository->create($input);

        Flash::success('Palavras Chave Negativas saved successfully.');

        return redirect(route('palavrasChaveNegativas.index'));
    }

    /**
     * Display the specified PalavrasChaveNegativas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $palavrasChaveNegativas = $this->palavrasChaveNegativasRepository->findWithoutFail($id);

        if (empty($palavrasChaveNegativas)) {
            Flash::error('Palavras Chave Negativas not found');

            return redirect(route('palavrasChaveNegativas.index'));
        }

        return view('palavras_chave_negativas.show')->with('palavrasChaveNegativas', $palavrasChaveNegativas);
    }

    /**
     * Show the form for editing the specified PalavrasChaveNegativas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $palavrasChaveNegativas = $this->palavrasChaveNegativasRepository->findWithoutFail($id);

        if (empty($palavrasChaveNegativas)) {
            Flash::error('Palavras Chave Negativas not found');

            return redirect(route('palavrasChaveNegativas.index'));
        }

        return view('palavras_chave_negativas.edit')->with('palavrasChaveNegativas', $palavrasChaveNegativas);
    }

    /**
     * Update the specified PalavrasChaveNegativas in storage.
     *
     * @param  int              $id
     * @param UpdatePalavrasChaveNegativasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePalavrasChaveNegativasRequest $request)
    {
        $palavrasChaveNegativas = $this->palavrasChaveNegativasRepository->findWithoutFail($id);

        if (empty($palavrasChaveNegativas)) {
            Flash::error('Palavras Chave Negativas not found');

            return redirect(route('palavrasChaveNegativas.index'));
        }

        $palavrasChaveNegativas = $this->palavrasChaveNegativasRepository->update($request->all(), $id);

        Flash::success('Palavras Chave Negativas updated successfully.');

        return redirect(route('palavrasChaveNegativas.index'));
    }

    /**
     * Remove the specified PalavrasChaveNegativas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $palavrasChaveNegativas = $this->palavrasChaveNegativasRepository->findWithoutFail($id);

        if (empty($palavrasChaveNegativas)) {
            Flash::error('Palavras Chave Negativas not found');

            return redirect(route('palavrasChaveNegativas.index'));
        }

        $this->palavrasChaveNegativasRepository->delete($id);

        Flash::success('Palavras Chave Negativas deleted successfully.');

        return redirect(route('palavrasChaveNegativas.index'));
    }
}

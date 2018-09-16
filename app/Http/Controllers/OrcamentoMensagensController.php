<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrcamentoMensagensRequest;
use App\Http\Requests\UpdateOrcamentoMensagensRequest;
use App\Repositories\OrcamentoMensagensRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class OrcamentoMensagensController extends AppBaseController
{
    /** @var  OrcamentoMensagensRepository */
    private $orcamentoMensagensRepository;

    public function __construct(OrcamentoMensagensRepository $orcamentoMensagensRepo)
    {
        $this->orcamentoMensagensRepository = $orcamentoMensagensRepo;
    }

    /**
     * Display a listing of the OrcamentoMensagens.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->orcamentoMensagensRepository->pushCriteria(new RequestCriteria($request));
        $orcamentoMensagens = $this->orcamentoMensagensRepository->paginate(10);

        return view('orcamento_mensagens.index')
            ->with('orcamentoMensagens', $orcamentoMensagens);
    }

    /**
     * Show the form for creating a new OrcamentoMensagens.
     *
     * @return Response
     */
    public function create()
    {
        return view('orcamento_mensagens.create');
    }

    /**
     * Store a newly created OrcamentoMensagens in storage.
     *
     * @param CreateOrcamentoMensagensRequest $request
     *
     * @return Response
     */
    public function store(CreateOrcamentoMensagensRequest $request)
    {
        $input = $request->all();

        $orcamentoMensagens = $this->orcamentoMensagensRepository->create($input);

        Flash::success('Orcamento Mensagens saved successfully.');

        return redirect(route('orcamentoMensagens.index'));
    }

    /**
     * Display the specified OrcamentoMensagens.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $orcamentoMensagens = $this->orcamentoMensagensRepository->findWithoutFail($id);

        if (empty($orcamentoMensagens)) {
            Flash::error('Orcamento Mensagens not found');

            return redirect(route('orcamentoMensagens.index'));
        }

        return view('orcamento_mensagens.show')->with('orcamentoMensagens', $orcamentoMensagens);
    }

    /**
     * Show the form for editing the specified OrcamentoMensagens.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $orcamentoMensagens = $this->orcamentoMensagensRepository->findWithoutFail($id);

        if (empty($orcamentoMensagens)) {
            Flash::error('Orcamento Mensagens not found');

            return redirect(route('orcamentoMensagens.index'));
        }

        return view('orcamento_mensagens.edit')->with('orcamentoMensagens', $orcamentoMensagens);
    }

    /**
     * Update the specified OrcamentoMensagens in storage.
     *
     * @param  int              $id
     * @param UpdateOrcamentoMensagensRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrcamentoMensagensRequest $request)
    {
        $orcamentoMensagens = $this->orcamentoMensagensRepository->findWithoutFail($id);

        if (empty($orcamentoMensagens)) {
            Flash::error('Orcamento Mensagens not found');

            return redirect(route('orcamentoMensagens.index'));
        }

        $orcamentoMensagens = $this->orcamentoMensagensRepository->update($request->all(), $id);

        Flash::success('Orcamento Mensagens updated successfully.');

        return redirect(route('orcamentoMensagens.index'));
    }

    /**
     * Remove the specified OrcamentoMensagens from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $orcamentoMensagens = $this->orcamentoMensagensRepository->findWithoutFail($id);

        if (empty($orcamentoMensagens)) {
            Flash::error('Orcamento Mensagens not found');

            return redirect(route('orcamentoMensagens.index'));
        }

        $this->orcamentoMensagensRepository->delete($id);

        Flash::success('Orcamento Mensagens deleted successfully.');

        return redirect(route('orcamentoMensagens.index'));
    }
}

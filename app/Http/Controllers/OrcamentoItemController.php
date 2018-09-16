<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrcamentoItemRequest;
use App\Http\Requests\UpdateOrcamentoItemRequest;
use App\Repositories\OrcamentoItemRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class OrcamentoItemController extends AppBaseController
{
    /** @var  OrcamentoItemRepository */
    private $orcamentoItemRepository;

    public function __construct(OrcamentoItemRepository $orcamentoItemRepo)
    {
        $this->orcamentoItemRepository = $orcamentoItemRepo;
    }

    /**
     * Display a listing of the OrcamentoItem.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->orcamentoItemRepository->pushCriteria(new RequestCriteria($request));
        $orcamentoItems = $this->orcamentoItemRepository->paginate(10);

        return view('orcamento_items.index')
            ->with('orcamentoItems', $orcamentoItems);
    }

    /**
     * Show the form for creating a new OrcamentoItem.
     *
     * @return Response
     */
    public function create()
    {
        return view('orcamento_items.create');
    }

    /**
     * Store a newly created OrcamentoItem in storage.
     *
     * @param CreateOrcamentoItemRequest $request
     *
     * @return Response
     */
    public function store(CreateOrcamentoItemRequest $request)
    {
        $input = $request->all();

        $orcamentoItem = $this->orcamentoItemRepository->create($input);

        Flash::success('Orcamento Item saved successfully.');

        return redirect(route('orcamentoItems.index'));
    }

    /**
     * Display the specified OrcamentoItem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $orcamentoItem = $this->orcamentoItemRepository->findWithoutFail($id);

        if (empty($orcamentoItem)) {
            Flash::error('Orcamento Item not found');

            return redirect(route('orcamentoItems.index'));
        }

        return view('orcamento_items.show')->with('orcamentoItem', $orcamentoItem);
    }

    /**
     * Show the form for editing the specified OrcamentoItem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $orcamentoItem = $this->orcamentoItemRepository->findWithoutFail($id);

        if (empty($orcamentoItem)) {
            Flash::error('Orcamento Item not found');

            return redirect(route('orcamentoItems.index'));
        }

        return view('orcamento_items.edit')->with('orcamentoItem', $orcamentoItem);
    }

    /**
     * Update the specified OrcamentoItem in storage.
     *
     * @param  int              $id
     * @param UpdateOrcamentoItemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrcamentoItemRequest $request)
    {
        $orcamentoItem = $this->orcamentoItemRepository->findWithoutFail($id);

        if (empty($orcamentoItem)) {
            Flash::error('Orcamento Item not found');

            return redirect(route('orcamentoItems.index'));
        }

        $orcamentoItem = $this->orcamentoItemRepository->update($request->all(), $id);

        Flash::success('Orcamento Item updated successfully.');

        return redirect(route('orcamentoItems.index'));
    }

    /**
     * Remove the specified OrcamentoItem from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $orcamentoItem = $this->orcamentoItemRepository->findWithoutFail($id);

        if (empty($orcamentoItem)) {
            Flash::error('Orcamento Item not found');

            return redirect(route('orcamentoItems.index'));
        }

        $this->orcamentoItemRepository->delete($id);

        Flash::success('Orcamento Item deleted successfully.');

        return redirect(route('orcamentoItems.index'));
    }
}

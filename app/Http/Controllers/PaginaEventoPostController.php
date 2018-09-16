<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaginaEventoPostRequest;
use App\Http\Requests\UpdatePaginaEventoPostRequest;
use App\Repositories\PaginaEventoPostRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PaginaEventoPostController extends AppBaseController
{
    /** @var  PaginaEventoPostRepository */
    private $paginaEventoPostRepository;

    public function __construct(PaginaEventoPostRepository $paginaEventoPostRepo)
    {
        $this->paginaEventoPostRepository = $paginaEventoPostRepo;
    }

    /**
     * Display a listing of the PaginaEventoPost.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->paginaEventoPostRepository->pushCriteria(new RequestCriteria($request));
        $paginaEventoPosts = $this->paginaEventoPostRepository->paginate(10);

        return view('pagina_evento_posts.index')
            ->with('paginaEventoPosts', $paginaEventoPosts);
    }

    /**
     * Show the form for creating a new PaginaEventoPost.
     *
     * @return Response
     */
    public function create()
    {
        return view('pagina_evento_posts.create');
    }

    /**
     * Store a newly created PaginaEventoPost in storage.
     *
     * @param CreatePaginaEventoPostRequest $request
     *
     * @return Response
     */
    public function store(CreatePaginaEventoPostRequest $request)
    {
        $input = $request->all();

        $paginaEventoPost = $this->paginaEventoPostRepository->create($input);

        Flash::success('Pagina Evento Post saved successfully.');

        return redirect(route('paginaEventoPosts.index'));
    }

    /**
     * Display the specified PaginaEventoPost.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paginaEventoPost = $this->paginaEventoPostRepository->findWithoutFail($id);

        if (empty($paginaEventoPost)) {
            Flash::error('Pagina Evento Post not found');

            return redirect(route('paginaEventoPosts.index'));
        }

        return view('pagina_evento_posts.show')->with('paginaEventoPost', $paginaEventoPost);
    }

    /**
     * Show the form for editing the specified PaginaEventoPost.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paginaEventoPost = $this->paginaEventoPostRepository->findWithoutFail($id);

        if (empty($paginaEventoPost)) {
            Flash::error('Pagina Evento Post not found');

            return redirect(route('paginaEventoPosts.index'));
        }

        return view('pagina_evento_posts.edit')->with('paginaEventoPost', $paginaEventoPost);
    }

    /**
     * Update the specified PaginaEventoPost in storage.
     *
     * @param  int              $id
     * @param UpdatePaginaEventoPostRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaginaEventoPostRequest $request)
    {
        $paginaEventoPost = $this->paginaEventoPostRepository->findWithoutFail($id);

        if (empty($paginaEventoPost)) {
            Flash::error('Pagina Evento Post not found');

            return redirect(route('paginaEventoPosts.index'));
        }

        $paginaEventoPost = $this->paginaEventoPostRepository->update($request->all(), $id);

        Flash::success('Pagina Evento Post updated successfully.');

        return redirect(route('paginaEventoPosts.index'));
    }

    /**
     * Remove the specified PaginaEventoPost from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paginaEventoPost = $this->paginaEventoPostRepository->findWithoutFail($id);

        if (empty($paginaEventoPost)) {
            Flash::error('Pagina Evento Post not found');

            return redirect(route('paginaEventoPosts.index'));
        }

        $this->paginaEventoPostRepository->delete($id);

        Flash::success('Pagina Evento Post deleted successfully.');

        return redirect(route('paginaEventoPosts.index'));
    }
}

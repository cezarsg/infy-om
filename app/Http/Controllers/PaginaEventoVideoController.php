<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaginaEventoVideoRequest;
use App\Http\Requests\UpdatePaginaEventoVideoRequest;
use App\Repositories\PaginaEventoVideoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PaginaEventoVideoController extends AppBaseController
{
    /** @var  PaginaEventoVideoRepository */
    private $paginaEventoVideoRepository;

    public function __construct(PaginaEventoVideoRepository $paginaEventoVideoRepo)
    {
        $this->paginaEventoVideoRepository = $paginaEventoVideoRepo;
    }

    /**
     * Display a listing of the PaginaEventoVideo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->paginaEventoVideoRepository->pushCriteria(new RequestCriteria($request));
        $paginaEventoVideos = $this->paginaEventoVideoRepository->paginate(10);

        return view('pagina_evento_videos.index')
            ->with('paginaEventoVideos', $paginaEventoVideos);
    }

    /**
     * Show the form for creating a new PaginaEventoVideo.
     *
     * @return Response
     */
    public function create()
    {
        return view('pagina_evento_videos.create');
    }

    /**
     * Store a newly created PaginaEventoVideo in storage.
     *
     * @param CreatePaginaEventoVideoRequest $request
     *
     * @return Response
     */
    public function store(CreatePaginaEventoVideoRequest $request)
    {
        $input = $request->all();

        $paginaEventoVideo = $this->paginaEventoVideoRepository->create($input);

        Flash::success('Pagina Evento Video saved successfully.');

        return redirect(route('paginaEventoVideos.index'));
    }

    /**
     * Display the specified PaginaEventoVideo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paginaEventoVideo = $this->paginaEventoVideoRepository->findWithoutFail($id);

        if (empty($paginaEventoVideo)) {
            Flash::error('Pagina Evento Video not found');

            return redirect(route('paginaEventoVideos.index'));
        }

        return view('pagina_evento_videos.show')->with('paginaEventoVideo', $paginaEventoVideo);
    }

    /**
     * Show the form for editing the specified PaginaEventoVideo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paginaEventoVideo = $this->paginaEventoVideoRepository->findWithoutFail($id);

        if (empty($paginaEventoVideo)) {
            Flash::error('Pagina Evento Video not found');

            return redirect(route('paginaEventoVideos.index'));
        }

        return view('pagina_evento_videos.edit')->with('paginaEventoVideo', $paginaEventoVideo);
    }

    /**
     * Update the specified PaginaEventoVideo in storage.
     *
     * @param  int              $id
     * @param UpdatePaginaEventoVideoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaginaEventoVideoRequest $request)
    {
        $paginaEventoVideo = $this->paginaEventoVideoRepository->findWithoutFail($id);

        if (empty($paginaEventoVideo)) {
            Flash::error('Pagina Evento Video not found');

            return redirect(route('paginaEventoVideos.index'));
        }

        $paginaEventoVideo = $this->paginaEventoVideoRepository->update($request->all(), $id);

        Flash::success('Pagina Evento Video updated successfully.');

        return redirect(route('paginaEventoVideos.index'));
    }

    /**
     * Remove the specified PaginaEventoVideo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paginaEventoVideo = $this->paginaEventoVideoRepository->findWithoutFail($id);

        if (empty($paginaEventoVideo)) {
            Flash::error('Pagina Evento Video not found');

            return redirect(route('paginaEventoVideos.index'));
        }

        $this->paginaEventoVideoRepository->delete($id);

        Flash::success('Pagina Evento Video deleted successfully.');

        return redirect(route('paginaEventoVideos.index'));
    }
}

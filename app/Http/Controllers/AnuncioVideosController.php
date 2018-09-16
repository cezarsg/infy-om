<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnuncioVideosRequest;
use App\Http\Requests\UpdateAnuncioVideosRequest;
use App\Repositories\AnuncioVideosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AnuncioVideosController extends AppBaseController
{
    /** @var  AnuncioVideosRepository */
    private $anuncioVideosRepository;

    public function __construct(AnuncioVideosRepository $anuncioVideosRepo)
    {
        $this->anuncioVideosRepository = $anuncioVideosRepo;
    }

    /**
     * Display a listing of the AnuncioVideos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncioVideosRepository->pushCriteria(new RequestCriteria($request));
        $anuncioVideos = $this->anuncioVideosRepository->paginate(10);

        return view('anuncio_videos.index')
            ->with('anuncioVideos', $anuncioVideos);
    }

    /**
     * Show the form for creating a new AnuncioVideos.
     *
     * @return Response
     */
    public function create()
    {
        return view('anuncio_videos.create');
    }

    /**
     * Store a newly created AnuncioVideos in storage.
     *
     * @param CreateAnuncioVideosRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncioVideosRequest $request)
    {
        $input = $request->all();

        $anuncioVideos = $this->anuncioVideosRepository->create($input);

        Flash::success('Anuncio Videos saved successfully.');

        return redirect(route('anuncioVideos.index'));
    }

    /**
     * Display the specified AnuncioVideos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $anuncioVideos = $this->anuncioVideosRepository->findWithoutFail($id);

        if (empty($anuncioVideos)) {
            Flash::error('Anuncio Videos not found');

            return redirect(route('anuncioVideos.index'));
        }

        return view('anuncio_videos.show')->with('anuncioVideos', $anuncioVideos);
    }

    /**
     * Show the form for editing the specified AnuncioVideos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $anuncioVideos = $this->anuncioVideosRepository->findWithoutFail($id);

        if (empty($anuncioVideos)) {
            Flash::error('Anuncio Videos not found');

            return redirect(route('anuncioVideos.index'));
        }

        return view('anuncio_videos.edit')->with('anuncioVideos', $anuncioVideos);
    }

    /**
     * Update the specified AnuncioVideos in storage.
     *
     * @param  int              $id
     * @param UpdateAnuncioVideosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncioVideosRequest $request)
    {
        $anuncioVideos = $this->anuncioVideosRepository->findWithoutFail($id);

        if (empty($anuncioVideos)) {
            Flash::error('Anuncio Videos not found');

            return redirect(route('anuncioVideos.index'));
        }

        $anuncioVideos = $this->anuncioVideosRepository->update($request->all(), $id);

        Flash::success('Anuncio Videos updated successfully.');

        return redirect(route('anuncioVideos.index'));
    }

    /**
     * Remove the specified AnuncioVideos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $anuncioVideos = $this->anuncioVideosRepository->findWithoutFail($id);

        if (empty($anuncioVideos)) {
            Flash::error('Anuncio Videos not found');

            return redirect(route('anuncioVideos.index'));
        }

        $this->anuncioVideosRepository->delete($id);

        Flash::success('Anuncio Videos deleted successfully.');

        return redirect(route('anuncioVideos.index'));
    }
}

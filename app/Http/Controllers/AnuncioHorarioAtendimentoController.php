<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnuncioHorarioAtendimentoRequest;
use App\Http\Requests\UpdateAnuncioHorarioAtendimentoRequest;
use App\Repositories\AnuncioHorarioAtendimentoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AnuncioHorarioAtendimentoController extends AppBaseController
{
    /** @var  AnuncioHorarioAtendimentoRepository */
    private $anuncioHorarioAtendimentoRepository;

    public function __construct(AnuncioHorarioAtendimentoRepository $anuncioHorarioAtendimentoRepo)
    {
        $this->anuncioHorarioAtendimentoRepository = $anuncioHorarioAtendimentoRepo;
    }

    /**
     * Display a listing of the AnuncioHorarioAtendimento.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->anuncioHorarioAtendimentoRepository->pushCriteria(new RequestCriteria($request));
        $anuncioHorarioAtendimentos = $this->anuncioHorarioAtendimentoRepository->paginate(10);

        return view('anuncio_horario_atendimentos.index')
            ->with('anuncioHorarioAtendimentos', $anuncioHorarioAtendimentos);
    }

    /**
     * Show the form for creating a new AnuncioHorarioAtendimento.
     *
     * @return Response
     */
    public function create()
    {
        return view('anuncio_horario_atendimentos.create');
    }

    /**
     * Store a newly created AnuncioHorarioAtendimento in storage.
     *
     * @param CreateAnuncioHorarioAtendimentoRequest $request
     *
     * @return Response
     */
    public function store(CreateAnuncioHorarioAtendimentoRequest $request)
    {
        $input = $request->all();

        $anuncioHorarioAtendimento = $this->anuncioHorarioAtendimentoRepository->create($input);

        Flash::success('Anuncio Horario Atendimento saved successfully.');

        return redirect(route('anuncioHorarioAtendimentos.index'));
    }

    /**
     * Display the specified AnuncioHorarioAtendimento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $anuncioHorarioAtendimento = $this->anuncioHorarioAtendimentoRepository->findWithoutFail($id);

        if (empty($anuncioHorarioAtendimento)) {
            Flash::error('Anuncio Horario Atendimento not found');

            return redirect(route('anuncioHorarioAtendimentos.index'));
        }

        return view('anuncio_horario_atendimentos.show')->with('anuncioHorarioAtendimento', $anuncioHorarioAtendimento);
    }

    /**
     * Show the form for editing the specified AnuncioHorarioAtendimento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $anuncioHorarioAtendimento = $this->anuncioHorarioAtendimentoRepository->findWithoutFail($id);

        if (empty($anuncioHorarioAtendimento)) {
            Flash::error('Anuncio Horario Atendimento not found');

            return redirect(route('anuncioHorarioAtendimentos.index'));
        }

        return view('anuncio_horario_atendimentos.edit')->with('anuncioHorarioAtendimento', $anuncioHorarioAtendimento);
    }

    /**
     * Update the specified AnuncioHorarioAtendimento in storage.
     *
     * @param  int              $id
     * @param UpdateAnuncioHorarioAtendimentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnuncioHorarioAtendimentoRequest $request)
    {
        $anuncioHorarioAtendimento = $this->anuncioHorarioAtendimentoRepository->findWithoutFail($id);

        if (empty($anuncioHorarioAtendimento)) {
            Flash::error('Anuncio Horario Atendimento not found');

            return redirect(route('anuncioHorarioAtendimentos.index'));
        }

        $anuncioHorarioAtendimento = $this->anuncioHorarioAtendimentoRepository->update($request->all(), $id);

        Flash::success('Anuncio Horario Atendimento updated successfully.');

        return redirect(route('anuncioHorarioAtendimentos.index'));
    }

    /**
     * Remove the specified AnuncioHorarioAtendimento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $anuncioHorarioAtendimento = $this->anuncioHorarioAtendimentoRepository->findWithoutFail($id);

        if (empty($anuncioHorarioAtendimento)) {
            Flash::error('Anuncio Horario Atendimento not found');

            return redirect(route('anuncioHorarioAtendimentos.index'));
        }

        $this->anuncioHorarioAtendimentoRepository->delete($id);

        Flash::success('Anuncio Horario Atendimento deleted successfully.');

        return redirect(route('anuncioHorarioAtendimentos.index'));
    }
}

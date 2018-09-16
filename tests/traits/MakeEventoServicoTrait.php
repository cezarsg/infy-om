<?php

use Faker\Factory as Faker;
use App\Models\EventoServico;
use App\Repositories\EventoServicoRepository;

trait MakeEventoServicoTrait
{
    /**
     * Create fake instance of EventoServico and save it in database
     *
     * @param array $eventoServicoFields
     * @return EventoServico
     */
    public function makeEventoServico($eventoServicoFields = [])
    {
        /** @var EventoServicoRepository $eventoServicoRepo */
        $eventoServicoRepo = App::make(EventoServicoRepository::class);
        $theme = $this->fakeEventoServicoData($eventoServicoFields);
        return $eventoServicoRepo->create($theme);
    }

    /**
     * Get fake instance of EventoServico
     *
     * @param array $eventoServicoFields
     * @return EventoServico
     */
    public function fakeEventoServico($eventoServicoFields = [])
    {
        return new EventoServico($this->fakeEventoServicoData($eventoServicoFields));
    }

    /**
     * Get fake data of EventoServico
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEventoServicoData($eventoServicoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idevento' => $fake->word,
            'idservico' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $eventoServicoFields);
    }
}

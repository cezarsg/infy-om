<?php

use Faker\Factory as Faker;
use App\Models\EventoHistorico;
use App\Repositories\EventoHistoricoRepository;

trait MakeEventoHistoricoTrait
{
    /**
     * Create fake instance of EventoHistorico and save it in database
     *
     * @param array $eventoHistoricoFields
     * @return EventoHistorico
     */
    public function makeEventoHistorico($eventoHistoricoFields = [])
    {
        /** @var EventoHistoricoRepository $eventoHistoricoRepo */
        $eventoHistoricoRepo = App::make(EventoHistoricoRepository::class);
        $theme = $this->fakeEventoHistoricoData($eventoHistoricoFields);
        return $eventoHistoricoRepo->create($theme);
    }

    /**
     * Get fake instance of EventoHistorico
     *
     * @param array $eventoHistoricoFields
     * @return EventoHistorico
     */
    public function fakeEventoHistorico($eventoHistoricoFields = [])
    {
        return new EventoHistorico($this->fakeEventoHistoricoData($eventoHistoricoFields));
    }

    /**
     * Get fake data of EventoHistorico
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEventoHistoricoData($eventoHistoricoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idevento' => $fake->word,
            'dtinclusao' => $fake->date('Y-m-d H:i:s'),
            'observacao' => $fake->word,
            'idstatus' => $fake->word,
            'idusuario' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $eventoHistoricoFields);
    }
}

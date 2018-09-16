<?php

use Faker\Factory as Faker;
use App\Models\EventoConvidados;
use App\Repositories\EventoConvidadosRepository;

trait MakeEventoConvidadosTrait
{
    /**
     * Create fake instance of EventoConvidados and save it in database
     *
     * @param array $eventoConvidadosFields
     * @return EventoConvidados
     */
    public function makeEventoConvidados($eventoConvidadosFields = [])
    {
        /** @var EventoConvidadosRepository $eventoConvidadosRepo */
        $eventoConvidadosRepo = App::make(EventoConvidadosRepository::class);
        $theme = $this->fakeEventoConvidadosData($eventoConvidadosFields);
        return $eventoConvidadosRepo->create($theme);
    }

    /**
     * Get fake instance of EventoConvidados
     *
     * @param array $eventoConvidadosFields
     * @return EventoConvidados
     */
    public function fakeEventoConvidados($eventoConvidadosFields = [])
    {
        return new EventoConvidados($this->fakeEventoConvidadosData($eventoConvidadosFields));
    }

    /**
     * Get fake data of EventoConvidados
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEventoConvidadosData($eventoConvidadosFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idevento' => $fake->word,
            'nome' => $fake->word,
            'email' => $fake->word,
            'apelido' => $fake->word,
            'confirmado' => $fake->word,
            'emailenviado' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $eventoConvidadosFields);
    }
}

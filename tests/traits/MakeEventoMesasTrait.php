<?php

use Faker\Factory as Faker;
use App\Models\EventoMesas;
use App\Repositories\EventoMesasRepository;

trait MakeEventoMesasTrait
{
    /**
     * Create fake instance of EventoMesas and save it in database
     *
     * @param array $eventoMesasFields
     * @return EventoMesas
     */
    public function makeEventoMesas($eventoMesasFields = [])
    {
        /** @var EventoMesasRepository $eventoMesasRepo */
        $eventoMesasRepo = App::make(EventoMesasRepository::class);
        $theme = $this->fakeEventoMesasData($eventoMesasFields);
        return $eventoMesasRepo->create($theme);
    }

    /**
     * Get fake instance of EventoMesas
     *
     * @param array $eventoMesasFields
     * @return EventoMesas
     */
    public function fakeEventoMesas($eventoMesasFields = [])
    {
        return new EventoMesas($this->fakeEventoMesasData($eventoMesasFields));
    }

    /**
     * Get fake data of EventoMesas
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEventoMesasData($eventoMesasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idconvidado' => $fake->word,
            'nmmesa' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $eventoMesasFields);
    }
}

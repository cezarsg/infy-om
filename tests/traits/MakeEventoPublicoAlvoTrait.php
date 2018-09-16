<?php

use Faker\Factory as Faker;
use App\Models\EventoPublicoAlvo;
use App\Repositories\EventoPublicoAlvoRepository;

trait MakeEventoPublicoAlvoTrait
{
    /**
     * Create fake instance of EventoPublicoAlvo and save it in database
     *
     * @param array $eventoPublicoAlvoFields
     * @return EventoPublicoAlvo
     */
    public function makeEventoPublicoAlvo($eventoPublicoAlvoFields = [])
    {
        /** @var EventoPublicoAlvoRepository $eventoPublicoAlvoRepo */
        $eventoPublicoAlvoRepo = App::make(EventoPublicoAlvoRepository::class);
        $theme = $this->fakeEventoPublicoAlvoData($eventoPublicoAlvoFields);
        return $eventoPublicoAlvoRepo->create($theme);
    }

    /**
     * Get fake instance of EventoPublicoAlvo
     *
     * @param array $eventoPublicoAlvoFields
     * @return EventoPublicoAlvo
     */
    public function fakeEventoPublicoAlvo($eventoPublicoAlvoFields = [])
    {
        return new EventoPublicoAlvo($this->fakeEventoPublicoAlvoData($eventoPublicoAlvoFields));
    }

    /**
     * Get fake data of EventoPublicoAlvo
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEventoPublicoAlvoData($eventoPublicoAlvoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idevento' => $fake->word,
            'idcidade' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $eventoPublicoAlvoFields);
    }
}

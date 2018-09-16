<?php

use Faker\Factory as Faker;
use App\Models\EventoConvite;
use App\Repositories\EventoConviteRepository;

trait MakeEventoConviteTrait
{
    /**
     * Create fake instance of EventoConvite and save it in database
     *
     * @param array $eventoConviteFields
     * @return EventoConvite
     */
    public function makeEventoConvite($eventoConviteFields = [])
    {
        /** @var EventoConviteRepository $eventoConviteRepo */
        $eventoConviteRepo = App::make(EventoConviteRepository::class);
        $theme = $this->fakeEventoConviteData($eventoConviteFields);
        return $eventoConviteRepo->create($theme);
    }

    /**
     * Get fake instance of EventoConvite
     *
     * @param array $eventoConviteFields
     * @return EventoConvite
     */
    public function fakeEventoConvite($eventoConviteFields = [])
    {
        return new EventoConvite($this->fakeEventoConviteData($eventoConviteFields));
    }

    /**
     * Get fake data of EventoConvite
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEventoConviteData($eventoConviteFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'quemconvida' => $fake->word,
            'titulo' => $fake->word,
            'mensagem' => $fake->word,
            'fotocaminho' => $fake->word,
            'idevento' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $eventoConviteFields);
    }
}

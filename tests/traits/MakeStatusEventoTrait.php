<?php

use Faker\Factory as Faker;
use App\Models\StatusEvento;
use App\Repositories\StatusEventoRepository;

trait MakeStatusEventoTrait
{
    /**
     * Create fake instance of StatusEvento and save it in database
     *
     * @param array $statusEventoFields
     * @return StatusEvento
     */
    public function makeStatusEvento($statusEventoFields = [])
    {
        /** @var StatusEventoRepository $statusEventoRepo */
        $statusEventoRepo = App::make(StatusEventoRepository::class);
        $theme = $this->fakeStatusEventoData($statusEventoFields);
        return $statusEventoRepo->create($theme);
    }

    /**
     * Get fake instance of StatusEvento
     *
     * @param array $statusEventoFields
     * @return StatusEvento
     */
    public function fakeStatusEvento($statusEventoFields = [])
    {
        return new StatusEvento($this->fakeStatusEventoData($statusEventoFields));
    }

    /**
     * Get fake data of StatusEvento
     *
     * @param array $postFields
     * @return array
     */
    public function fakeStatusEventoData($statusEventoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'descricao' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $statusEventoFields);
    }
}

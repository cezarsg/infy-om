<?php

use Faker\Factory as Faker;
use App\Models\EventoPalavrasChave;
use App\Repositories\EventoPalavrasChaveRepository;

trait MakeEventoPalavrasChaveTrait
{
    /**
     * Create fake instance of EventoPalavrasChave and save it in database
     *
     * @param array $eventoPalavrasChaveFields
     * @return EventoPalavrasChave
     */
    public function makeEventoPalavrasChave($eventoPalavrasChaveFields = [])
    {
        /** @var EventoPalavrasChaveRepository $eventoPalavrasChaveRepo */
        $eventoPalavrasChaveRepo = App::make(EventoPalavrasChaveRepository::class);
        $theme = $this->fakeEventoPalavrasChaveData($eventoPalavrasChaveFields);
        return $eventoPalavrasChaveRepo->create($theme);
    }

    /**
     * Get fake instance of EventoPalavrasChave
     *
     * @param array $eventoPalavrasChaveFields
     * @return EventoPalavrasChave
     */
    public function fakeEventoPalavrasChave($eventoPalavrasChaveFields = [])
    {
        return new EventoPalavrasChave($this->fakeEventoPalavrasChaveData($eventoPalavrasChaveFields));
    }

    /**
     * Get fake data of EventoPalavrasChave
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEventoPalavrasChaveData($eventoPalavrasChaveFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idevento' => $fake->word,
            'palavra' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $eventoPalavrasChaveFields);
    }
}

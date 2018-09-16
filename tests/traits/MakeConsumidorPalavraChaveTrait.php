<?php

use Faker\Factory as Faker;
use App\Models\ConsumidorPalavraChave;
use App\Repositories\ConsumidorPalavraChaveRepository;

trait MakeConsumidorPalavraChaveTrait
{
    /**
     * Create fake instance of ConsumidorPalavraChave and save it in database
     *
     * @param array $consumidorPalavraChaveFields
     * @return ConsumidorPalavraChave
     */
    public function makeConsumidorPalavraChave($consumidorPalavraChaveFields = [])
    {
        /** @var ConsumidorPalavraChaveRepository $consumidorPalavraChaveRepo */
        $consumidorPalavraChaveRepo = App::make(ConsumidorPalavraChaveRepository::class);
        $theme = $this->fakeConsumidorPalavraChaveData($consumidorPalavraChaveFields);
        return $consumidorPalavraChaveRepo->create($theme);
    }

    /**
     * Get fake instance of ConsumidorPalavraChave
     *
     * @param array $consumidorPalavraChaveFields
     * @return ConsumidorPalavraChave
     */
    public function fakeConsumidorPalavraChave($consumidorPalavraChaveFields = [])
    {
        return new ConsumidorPalavraChave($this->fakeConsumidorPalavraChaveData($consumidorPalavraChaveFields));
    }

    /**
     * Get fake data of ConsumidorPalavraChave
     *
     * @param array $postFields
     * @return array
     */
    public function fakeConsumidorPalavraChaveData($consumidorPalavraChaveFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idconsumidor' => $fake->word,
            'idpalavra' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $consumidorPalavraChaveFields);
    }
}

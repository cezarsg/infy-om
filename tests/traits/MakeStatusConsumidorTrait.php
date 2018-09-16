<?php

use Faker\Factory as Faker;
use App\Models\StatusConsumidor;
use App\Repositories\StatusConsumidorRepository;

trait MakeStatusConsumidorTrait
{
    /**
     * Create fake instance of StatusConsumidor and save it in database
     *
     * @param array $statusConsumidorFields
     * @return StatusConsumidor
     */
    public function makeStatusConsumidor($statusConsumidorFields = [])
    {
        /** @var StatusConsumidorRepository $statusConsumidorRepo */
        $statusConsumidorRepo = App::make(StatusConsumidorRepository::class);
        $theme = $this->fakeStatusConsumidorData($statusConsumidorFields);
        return $statusConsumidorRepo->create($theme);
    }

    /**
     * Get fake instance of StatusConsumidor
     *
     * @param array $statusConsumidorFields
     * @return StatusConsumidor
     */
    public function fakeStatusConsumidor($statusConsumidorFields = [])
    {
        return new StatusConsumidor($this->fakeStatusConsumidorData($statusConsumidorFields));
    }

    /**
     * Get fake data of StatusConsumidor
     *
     * @param array $postFields
     * @return array
     */
    public function fakeStatusConsumidorData($statusConsumidorFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'descricao' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $statusConsumidorFields);
    }
}

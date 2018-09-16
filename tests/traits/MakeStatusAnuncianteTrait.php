<?php

use Faker\Factory as Faker;
use App\Models\StatusAnunciante;
use App\Repositories\StatusAnuncianteRepository;

trait MakeStatusAnuncianteTrait
{
    /**
     * Create fake instance of StatusAnunciante and save it in database
     *
     * @param array $statusAnuncianteFields
     * @return StatusAnunciante
     */
    public function makeStatusAnunciante($statusAnuncianteFields = [])
    {
        /** @var StatusAnuncianteRepository $statusAnuncianteRepo */
        $statusAnuncianteRepo = App::make(StatusAnuncianteRepository::class);
        $theme = $this->fakeStatusAnuncianteData($statusAnuncianteFields);
        return $statusAnuncianteRepo->create($theme);
    }

    /**
     * Get fake instance of StatusAnunciante
     *
     * @param array $statusAnuncianteFields
     * @return StatusAnunciante
     */
    public function fakeStatusAnunciante($statusAnuncianteFields = [])
    {
        return new StatusAnunciante($this->fakeStatusAnuncianteData($statusAnuncianteFields));
    }

    /**
     * Get fake data of StatusAnunciante
     *
     * @param array $postFields
     * @return array
     */
    public function fakeStatusAnuncianteData($statusAnuncianteFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'descricao' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $statusAnuncianteFields);
    }
}

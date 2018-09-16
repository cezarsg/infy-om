<?php

use Faker\Factory as Faker;
use App\Models\EstiloMusical;
use App\Repositories\EstiloMusicalRepository;

trait MakeEstiloMusicalTrait
{
    /**
     * Create fake instance of EstiloMusical and save it in database
     *
     * @param array $estiloMusicalFields
     * @return EstiloMusical
     */
    public function makeEstiloMusical($estiloMusicalFields = [])
    {
        /** @var EstiloMusicalRepository $estiloMusicalRepo */
        $estiloMusicalRepo = App::make(EstiloMusicalRepository::class);
        $theme = $this->fakeEstiloMusicalData($estiloMusicalFields);
        return $estiloMusicalRepo->create($theme);
    }

    /**
     * Get fake instance of EstiloMusical
     *
     * @param array $estiloMusicalFields
     * @return EstiloMusical
     */
    public function fakeEstiloMusical($estiloMusicalFields = [])
    {
        return new EstiloMusical($this->fakeEstiloMusicalData($estiloMusicalFields));
    }

    /**
     * Get fake data of EstiloMusical
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEstiloMusicalData($estiloMusicalFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'descricao' => $fake->word,
            'ativo' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $estiloMusicalFields);
    }
}

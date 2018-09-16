<?php

use Faker\Factory as Faker;
use App\Models\PreferenciaSaida;
use App\Repositories\PreferenciaSaidaRepository;

trait MakePreferenciaSaidaTrait
{
    /**
     * Create fake instance of PreferenciaSaida and save it in database
     *
     * @param array $preferenciaSaidaFields
     * @return PreferenciaSaida
     */
    public function makePreferenciaSaida($preferenciaSaidaFields = [])
    {
        /** @var PreferenciaSaidaRepository $preferenciaSaidaRepo */
        $preferenciaSaidaRepo = App::make(PreferenciaSaidaRepository::class);
        $theme = $this->fakePreferenciaSaidaData($preferenciaSaidaFields);
        return $preferenciaSaidaRepo->create($theme);
    }

    /**
     * Get fake instance of PreferenciaSaida
     *
     * @param array $preferenciaSaidaFields
     * @return PreferenciaSaida
     */
    public function fakePreferenciaSaida($preferenciaSaidaFields = [])
    {
        return new PreferenciaSaida($this->fakePreferenciaSaidaData($preferenciaSaidaFields));
    }

    /**
     * Get fake data of PreferenciaSaida
     *
     * @param array $postFields
     * @return array
     */
    public function fakePreferenciaSaidaData($preferenciaSaidaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'descricao' => $fake->word,
            'ativo' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $preferenciaSaidaFields);
    }
}

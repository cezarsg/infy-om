<?php

use Faker\Factory as Faker;
use App\Models\AnuncioPremios;
use App\Repositories\AnuncioPremiosRepository;

trait MakeAnuncioPremiosTrait
{
    /**
     * Create fake instance of AnuncioPremios and save it in database
     *
     * @param array $anuncioPremiosFields
     * @return AnuncioPremios
     */
    public function makeAnuncioPremios($anuncioPremiosFields = [])
    {
        /** @var AnuncioPremiosRepository $anuncioPremiosRepo */
        $anuncioPremiosRepo = App::make(AnuncioPremiosRepository::class);
        $theme = $this->fakeAnuncioPremiosData($anuncioPremiosFields);
        return $anuncioPremiosRepo->create($theme);
    }

    /**
     * Get fake instance of AnuncioPremios
     *
     * @param array $anuncioPremiosFields
     * @return AnuncioPremios
     */
    public function fakeAnuncioPremios($anuncioPremiosFields = [])
    {
        return new AnuncioPremios($this->fakeAnuncioPremiosData($anuncioPremiosFields));
    }

    /**
     * Get fake data of AnuncioPremios
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAnuncioPremiosData($anuncioPremiosFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idanuncio' => $fake->word,
            'fotopremiocaminho' => $fake->word,
            'descricao' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $anuncioPremiosFields);
    }
}

<?php

use Faker\Factory as Faker;
use App\Models\AnuncioFotos;
use App\Repositories\AnuncioFotosRepository;

trait MakeAnuncioFotosTrait
{
    /**
     * Create fake instance of AnuncioFotos and save it in database
     *
     * @param array $anuncioFotosFields
     * @return AnuncioFotos
     */
    public function makeAnuncioFotos($anuncioFotosFields = [])
    {
        /** @var AnuncioFotosRepository $anuncioFotosRepo */
        $anuncioFotosRepo = App::make(AnuncioFotosRepository::class);
        $theme = $this->fakeAnuncioFotosData($anuncioFotosFields);
        return $anuncioFotosRepo->create($theme);
    }

    /**
     * Get fake instance of AnuncioFotos
     *
     * @param array $anuncioFotosFields
     * @return AnuncioFotos
     */
    public function fakeAnuncioFotos($anuncioFotosFields = [])
    {
        return new AnuncioFotos($this->fakeAnuncioFotosData($anuncioFotosFields));
    }

    /**
     * Get fake data of AnuncioFotos
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAnuncioFotosData($anuncioFotosFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idanuncio' => $fake->word,
            'fotocaminho' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $anuncioFotosFields);
    }
}

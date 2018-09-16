<?php

use Faker\Factory as Faker;
use App\Models\AnuncioPrecoMedioEvento;
use App\Repositories\AnuncioPrecoMedioEventoRepository;

trait MakeAnuncioPrecoMedioEventoTrait
{
    /**
     * Create fake instance of AnuncioPrecoMedioEvento and save it in database
     *
     * @param array $anuncioPrecoMedioEventoFields
     * @return AnuncioPrecoMedioEvento
     */
    public function makeAnuncioPrecoMedioEvento($anuncioPrecoMedioEventoFields = [])
    {
        /** @var AnuncioPrecoMedioEventoRepository $anuncioPrecoMedioEventoRepo */
        $anuncioPrecoMedioEventoRepo = App::make(AnuncioPrecoMedioEventoRepository::class);
        $theme = $this->fakeAnuncioPrecoMedioEventoData($anuncioPrecoMedioEventoFields);
        return $anuncioPrecoMedioEventoRepo->create($theme);
    }

    /**
     * Get fake instance of AnuncioPrecoMedioEvento
     *
     * @param array $anuncioPrecoMedioEventoFields
     * @return AnuncioPrecoMedioEvento
     */
    public function fakeAnuncioPrecoMedioEvento($anuncioPrecoMedioEventoFields = [])
    {
        return new AnuncioPrecoMedioEvento($this->fakeAnuncioPrecoMedioEventoData($anuncioPrecoMedioEventoFields));
    }

    /**
     * Get fake data of AnuncioPrecoMedioEvento
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAnuncioPrecoMedioEventoData($anuncioPrecoMedioEventoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idanuncio' => $fake->word,
            'idtipoevento' => $fake->word,
            'precoMedioCobrado' => $fake->word,
            'precoMedioCobradoPorTipo' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $anuncioPrecoMedioEventoFields);
    }
}

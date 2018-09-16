<?php

use Faker\Factory as Faker;
use App\Models\AnuncioAvaliacao;
use App\Repositories\AnuncioAvaliacaoRepository;

trait MakeAnuncioAvaliacaoTrait
{
    /**
     * Create fake instance of AnuncioAvaliacao and save it in database
     *
     * @param array $anuncioAvaliacaoFields
     * @return AnuncioAvaliacao
     */
    public function makeAnuncioAvaliacao($anuncioAvaliacaoFields = [])
    {
        /** @var AnuncioAvaliacaoRepository $anuncioAvaliacaoRepo */
        $anuncioAvaliacaoRepo = App::make(AnuncioAvaliacaoRepository::class);
        $theme = $this->fakeAnuncioAvaliacaoData($anuncioAvaliacaoFields);
        return $anuncioAvaliacaoRepo->create($theme);
    }

    /**
     * Get fake instance of AnuncioAvaliacao
     *
     * @param array $anuncioAvaliacaoFields
     * @return AnuncioAvaliacao
     */
    public function fakeAnuncioAvaliacao($anuncioAvaliacaoFields = [])
    {
        return new AnuncioAvaliacao($this->fakeAnuncioAvaliacaoData($anuncioAvaliacaoFields));
    }

    /**
     * Get fake data of AnuncioAvaliacao
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAnuncioAvaliacaoData($anuncioAvaliacaoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idanuncio' => $fake->word,
            'nrestrelas' => $fake->randomDigitNotNull,
            'observacao' => $fake->word,
            'idusuario' => $fake->word,
            'dtinclusao' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $anuncioAvaliacaoFields);
    }
}

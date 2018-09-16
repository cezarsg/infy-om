<?php

use Faker\Factory as Faker;
use App\Models\AnuncioAbrangenciaAtuacao;
use App\Repositories\AnuncioAbrangenciaAtuacaoRepository;

trait MakeAnuncioAbrangenciaAtuacaoTrait
{
    /**
     * Create fake instance of AnuncioAbrangenciaAtuacao and save it in database
     *
     * @param array $anuncioAbrangenciaAtuacaoFields
     * @return AnuncioAbrangenciaAtuacao
     */
    public function makeAnuncioAbrangenciaAtuacao($anuncioAbrangenciaAtuacaoFields = [])
    {
        /** @var AnuncioAbrangenciaAtuacaoRepository $anuncioAbrangenciaAtuacaoRepo */
        $anuncioAbrangenciaAtuacaoRepo = App::make(AnuncioAbrangenciaAtuacaoRepository::class);
        $theme = $this->fakeAnuncioAbrangenciaAtuacaoData($anuncioAbrangenciaAtuacaoFields);
        return $anuncioAbrangenciaAtuacaoRepo->create($theme);
    }

    /**
     * Get fake instance of AnuncioAbrangenciaAtuacao
     *
     * @param array $anuncioAbrangenciaAtuacaoFields
     * @return AnuncioAbrangenciaAtuacao
     */
    public function fakeAnuncioAbrangenciaAtuacao($anuncioAbrangenciaAtuacaoFields = [])
    {
        return new AnuncioAbrangenciaAtuacao($this->fakeAnuncioAbrangenciaAtuacaoData($anuncioAbrangenciaAtuacaoFields));
    }

    /**
     * Get fake data of AnuncioAbrangenciaAtuacao
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAnuncioAbrangenciaAtuacaoData($anuncioAbrangenciaAtuacaoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idanuncio' => $fake->word,
            'abrangencia' => $fake->word,
            'idestado' => $fake->word,
            'idcidade' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $anuncioAbrangenciaAtuacaoFields);
    }
}

<?php

use Faker\Factory as Faker;
use App\Models\AnuncioDiaPromocoes;
use App\Repositories\AnuncioDiaPromocoesRepository;

trait MakeAnuncioDiaPromocoesTrait
{
    /**
     * Create fake instance of AnuncioDiaPromocoes and save it in database
     *
     * @param array $anuncioDiaPromocoesFields
     * @return AnuncioDiaPromocoes
     */
    public function makeAnuncioDiaPromocoes($anuncioDiaPromocoesFields = [])
    {
        /** @var AnuncioDiaPromocoesRepository $anuncioDiaPromocoesRepo */
        $anuncioDiaPromocoesRepo = App::make(AnuncioDiaPromocoesRepository::class);
        $theme = $this->fakeAnuncioDiaPromocoesData($anuncioDiaPromocoesFields);
        return $anuncioDiaPromocoesRepo->create($theme);
    }

    /**
     * Get fake instance of AnuncioDiaPromocoes
     *
     * @param array $anuncioDiaPromocoesFields
     * @return AnuncioDiaPromocoes
     */
    public function fakeAnuncioDiaPromocoes($anuncioDiaPromocoesFields = [])
    {
        return new AnuncioDiaPromocoes($this->fakeAnuncioDiaPromocoesData($anuncioDiaPromocoesFields));
    }

    /**
     * Get fake data of AnuncioDiaPromocoes
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAnuncioDiaPromocoesData($anuncioDiaPromocoesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idanuncio' => $fake->word,
            'nome' => $fake->word,
            'descricao' => $fake->word,
            'dataInicial' => $fake->word,
            'dataFinal' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $anuncioDiaPromocoesFields);
    }
}

<?php

use Faker\Factory as Faker;
use App\Models\AnuncioTemaEstabelecimento;
use App\Repositories\AnuncioTemaEstabelecimentoRepository;

trait MakeAnuncioTemaEstabelecimentoTrait
{
    /**
     * Create fake instance of AnuncioTemaEstabelecimento and save it in database
     *
     * @param array $anuncioTemaEstabelecimentoFields
     * @return AnuncioTemaEstabelecimento
     */
    public function makeAnuncioTemaEstabelecimento($anuncioTemaEstabelecimentoFields = [])
    {
        /** @var AnuncioTemaEstabelecimentoRepository $anuncioTemaEstabelecimentoRepo */
        $anuncioTemaEstabelecimentoRepo = App::make(AnuncioTemaEstabelecimentoRepository::class);
        $theme = $this->fakeAnuncioTemaEstabelecimentoData($anuncioTemaEstabelecimentoFields);
        return $anuncioTemaEstabelecimentoRepo->create($theme);
    }

    /**
     * Get fake instance of AnuncioTemaEstabelecimento
     *
     * @param array $anuncioTemaEstabelecimentoFields
     * @return AnuncioTemaEstabelecimento
     */
    public function fakeAnuncioTemaEstabelecimento($anuncioTemaEstabelecimentoFields = [])
    {
        return new AnuncioTemaEstabelecimento($this->fakeAnuncioTemaEstabelecimentoData($anuncioTemaEstabelecimentoFields));
    }

    /**
     * Get fake data of AnuncioTemaEstabelecimento
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAnuncioTemaEstabelecimentoData($anuncioTemaEstabelecimentoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idanuncio' => $fake->word,
            'idtemaestabelecimento' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $anuncioTemaEstabelecimentoFields);
    }
}

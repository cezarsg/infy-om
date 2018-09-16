<?php

use Faker\Factory as Faker;
use App\Models\TemaEstabelecimento;
use App\Repositories\TemaEstabelecimentoRepository;

trait MakeTemaEstabelecimentoTrait
{
    /**
     * Create fake instance of TemaEstabelecimento and save it in database
     *
     * @param array $temaEstabelecimentoFields
     * @return TemaEstabelecimento
     */
    public function makeTemaEstabelecimento($temaEstabelecimentoFields = [])
    {
        /** @var TemaEstabelecimentoRepository $temaEstabelecimentoRepo */
        $temaEstabelecimentoRepo = App::make(TemaEstabelecimentoRepository::class);
        $theme = $this->fakeTemaEstabelecimentoData($temaEstabelecimentoFields);
        return $temaEstabelecimentoRepo->create($theme);
    }

    /**
     * Get fake instance of TemaEstabelecimento
     *
     * @param array $temaEstabelecimentoFields
     * @return TemaEstabelecimento
     */
    public function fakeTemaEstabelecimento($temaEstabelecimentoFields = [])
    {
        return new TemaEstabelecimento($this->fakeTemaEstabelecimentoData($temaEstabelecimentoFields));
    }

    /**
     * Get fake data of TemaEstabelecimento
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTemaEstabelecimentoData($temaEstabelecimentoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'descricao' => $fake->word,
            'ativo' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $temaEstabelecimentoFields);
    }
}

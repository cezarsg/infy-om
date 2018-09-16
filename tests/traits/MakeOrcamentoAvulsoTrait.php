<?php

use Faker\Factory as Faker;
use App\Models\OrcamentoAvulso;
use App\Repositories\OrcamentoAvulsoRepository;

trait MakeOrcamentoAvulsoTrait
{
    /**
     * Create fake instance of OrcamentoAvulso and save it in database
     *
     * @param array $orcamentoAvulsoFields
     * @return OrcamentoAvulso
     */
    public function makeOrcamentoAvulso($orcamentoAvulsoFields = [])
    {
        /** @var OrcamentoAvulsoRepository $orcamentoAvulsoRepo */
        $orcamentoAvulsoRepo = App::make(OrcamentoAvulsoRepository::class);
        $theme = $this->fakeOrcamentoAvulsoData($orcamentoAvulsoFields);
        return $orcamentoAvulsoRepo->create($theme);
    }

    /**
     * Get fake instance of OrcamentoAvulso
     *
     * @param array $orcamentoAvulsoFields
     * @return OrcamentoAvulso
     */
    public function fakeOrcamentoAvulso($orcamentoAvulsoFields = [])
    {
        return new OrcamentoAvulso($this->fakeOrcamentoAvulsoData($orcamentoAvulsoFields));
    }

    /**
     * Get fake data of OrcamentoAvulso
     *
     * @param array $postFields
     * @return array
     */
    public function fakeOrcamentoAvulsoData($orcamentoAvulsoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idanuncio' => $fake->word,
            'nome' => $fake->word,
            'email' => $fake->word,
            'telefone' => $fake->word,
            'dtevento' => $fake->word,
            'localizacao' => $fake->word,
            'dsevento' => $fake->word,
            'dtinclusao' => $fake->date('Y-m-d H:i:s'),
            'ativo' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $orcamentoAvulsoFields);
    }
}

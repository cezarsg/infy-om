<?php

use Faker\Factory as Faker;
use App\Models\OrcamentoMensagens;
use App\Repositories\OrcamentoMensagensRepository;

trait MakeOrcamentoMensagensTrait
{
    /**
     * Create fake instance of OrcamentoMensagens and save it in database
     *
     * @param array $orcamentoMensagensFields
     * @return OrcamentoMensagens
     */
    public function makeOrcamentoMensagens($orcamentoMensagensFields = [])
    {
        /** @var OrcamentoMensagensRepository $orcamentoMensagensRepo */
        $orcamentoMensagensRepo = App::make(OrcamentoMensagensRepository::class);
        $theme = $this->fakeOrcamentoMensagensData($orcamentoMensagensFields);
        return $orcamentoMensagensRepo->create($theme);
    }

    /**
     * Get fake instance of OrcamentoMensagens
     *
     * @param array $orcamentoMensagensFields
     * @return OrcamentoMensagens
     */
    public function fakeOrcamentoMensagens($orcamentoMensagensFields = [])
    {
        return new OrcamentoMensagens($this->fakeOrcamentoMensagensData($orcamentoMensagensFields));
    }

    /**
     * Get fake data of OrcamentoMensagens
     *
     * @param array $postFields
     * @return array
     */
    public function fakeOrcamentoMensagensData($orcamentoMensagensFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idorcamento' => $fake->word,
            'tipomensagem' => $fake->word,
            'idPergunta' => $fake->word,
            'dtinclusao' => $fake->date('Y-m-d H:i:s'),
            'mensagem' => $fake->word,
            'incluidapor' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $orcamentoMensagensFields);
    }
}

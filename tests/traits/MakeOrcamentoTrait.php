<?php

use Faker\Factory as Faker;
use App\Models\Orcamento;
use App\Repositories\OrcamentoRepository;

trait MakeOrcamentoTrait
{
    /**
     * Create fake instance of Orcamento and save it in database
     *
     * @param array $orcamentoFields
     * @return Orcamento
     */
    public function makeOrcamento($orcamentoFields = [])
    {
        /** @var OrcamentoRepository $orcamentoRepo */
        $orcamentoRepo = App::make(OrcamentoRepository::class);
        $theme = $this->fakeOrcamentoData($orcamentoFields);
        return $orcamentoRepo->create($theme);
    }

    /**
     * Get fake instance of Orcamento
     *
     * @param array $orcamentoFields
     * @return Orcamento
     */
    public function fakeOrcamento($orcamentoFields = [])
    {
        return new Orcamento($this->fakeOrcamentoData($orcamentoFields));
    }

    /**
     * Get fake data of Orcamento
     *
     * @param array $postFields
     * @return array
     */
    public function fakeOrcamentoData($orcamentoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'descricaoservico' => $fake->word,
            'idservico' => $fake->word,
            'idstatus' => $fake->word,
            'idevento' => $fake->word,
            'idanuncio' => $fake->word,
            'dtvalidade' => $fake->word,
            'dtinclusao' => $fake->date('Y-m-d H:i:s'),
            'dtresposta' => $fake->date('Y-m-d H:i:s'),
            'dtalteracao' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $orcamentoFields);
    }
}

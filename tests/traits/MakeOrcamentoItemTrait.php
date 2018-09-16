<?php

use Faker\Factory as Faker;
use App\Models\OrcamentoItem;
use App\Repositories\OrcamentoItemRepository;

trait MakeOrcamentoItemTrait
{
    /**
     * Create fake instance of OrcamentoItem and save it in database
     *
     * @param array $orcamentoItemFields
     * @return OrcamentoItem
     */
    public function makeOrcamentoItem($orcamentoItemFields = [])
    {
        /** @var OrcamentoItemRepository $orcamentoItemRepo */
        $orcamentoItemRepo = App::make(OrcamentoItemRepository::class);
        $theme = $this->fakeOrcamentoItemData($orcamentoItemFields);
        return $orcamentoItemRepo->create($theme);
    }

    /**
     * Get fake instance of OrcamentoItem
     *
     * @param array $orcamentoItemFields
     * @return OrcamentoItem
     */
    public function fakeOrcamentoItem($orcamentoItemFields = [])
    {
        return new OrcamentoItem($this->fakeOrcamentoItemData($orcamentoItemFields));
    }

    /**
     * Get fake data of OrcamentoItem
     *
     * @param array $postFields
     * @return array
     */
    public function fakeOrcamentoItemData($orcamentoItemFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idorcamento' => $fake->word,
            'descricao' => $fake->word,
            'quantidade' => $fake->randomDigitNotNull,
            'vlrunitario' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $orcamentoItemFields);
    }
}

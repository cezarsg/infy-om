<?php

use Faker\Factory as Faker;
use App\Models\StatusOrcamento;
use App\Repositories\StatusOrcamentoRepository;

trait MakeStatusOrcamentoTrait
{
    /**
     * Create fake instance of StatusOrcamento and save it in database
     *
     * @param array $statusOrcamentoFields
     * @return StatusOrcamento
     */
    public function makeStatusOrcamento($statusOrcamentoFields = [])
    {
        /** @var StatusOrcamentoRepository $statusOrcamentoRepo */
        $statusOrcamentoRepo = App::make(StatusOrcamentoRepository::class);
        $theme = $this->fakeStatusOrcamentoData($statusOrcamentoFields);
        return $statusOrcamentoRepo->create($theme);
    }

    /**
     * Get fake instance of StatusOrcamento
     *
     * @param array $statusOrcamentoFields
     * @return StatusOrcamento
     */
    public function fakeStatusOrcamento($statusOrcamentoFields = [])
    {
        return new StatusOrcamento($this->fakeStatusOrcamentoData($statusOrcamentoFields));
    }

    /**
     * Get fake data of StatusOrcamento
     *
     * @param array $postFields
     * @return array
     */
    public function fakeStatusOrcamentoData($statusOrcamentoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'descricao' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $statusOrcamentoFields);
    }
}

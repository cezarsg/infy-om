<?php

use Faker\Factory as Faker;
use App\Models\ConsumidorHistorico;
use App\Repositories\ConsumidorHistoricoRepository;

trait MakeConsumidorHistoricoTrait
{
    /**
     * Create fake instance of ConsumidorHistorico and save it in database
     *
     * @param array $consumidorHistoricoFields
     * @return ConsumidorHistorico
     */
    public function makeConsumidorHistorico($consumidorHistoricoFields = [])
    {
        /** @var ConsumidorHistoricoRepository $consumidorHistoricoRepo */
        $consumidorHistoricoRepo = App::make(ConsumidorHistoricoRepository::class);
        $theme = $this->fakeConsumidorHistoricoData($consumidorHistoricoFields);
        return $consumidorHistoricoRepo->create($theme);
    }

    /**
     * Get fake instance of ConsumidorHistorico
     *
     * @param array $consumidorHistoricoFields
     * @return ConsumidorHistorico
     */
    public function fakeConsumidorHistorico($consumidorHistoricoFields = [])
    {
        return new ConsumidorHistorico($this->fakeConsumidorHistoricoData($consumidorHistoricoFields));
    }

    /**
     * Get fake data of ConsumidorHistorico
     *
     * @param array $postFields
     * @return array
     */
    public function fakeConsumidorHistoricoData($consumidorHistoricoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idconsumidor' => $fake->word,
            'dtinclusao' => $fake->date('Y-m-d H:i:s'),
            'observacao' => $fake->word,
            'idstatus' => $fake->word,
            'idusuario' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $consumidorHistoricoFields);
    }
}

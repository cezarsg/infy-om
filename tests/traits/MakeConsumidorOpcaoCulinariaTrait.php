<?php

use Faker\Factory as Faker;
use App\Models\ConsumidorOpcaoCulinaria;
use App\Repositories\ConsumidorOpcaoCulinariaRepository;

trait MakeConsumidorOpcaoCulinariaTrait
{
    /**
     * Create fake instance of ConsumidorOpcaoCulinaria and save it in database
     *
     * @param array $consumidorOpcaoCulinariaFields
     * @return ConsumidorOpcaoCulinaria
     */
    public function makeConsumidorOpcaoCulinaria($consumidorOpcaoCulinariaFields = [])
    {
        /** @var ConsumidorOpcaoCulinariaRepository $consumidorOpcaoCulinariaRepo */
        $consumidorOpcaoCulinariaRepo = App::make(ConsumidorOpcaoCulinariaRepository::class);
        $theme = $this->fakeConsumidorOpcaoCulinariaData($consumidorOpcaoCulinariaFields);
        return $consumidorOpcaoCulinariaRepo->create($theme);
    }

    /**
     * Get fake instance of ConsumidorOpcaoCulinaria
     *
     * @param array $consumidorOpcaoCulinariaFields
     * @return ConsumidorOpcaoCulinaria
     */
    public function fakeConsumidorOpcaoCulinaria($consumidorOpcaoCulinariaFields = [])
    {
        return new ConsumidorOpcaoCulinaria($this->fakeConsumidorOpcaoCulinariaData($consumidorOpcaoCulinariaFields));
    }

    /**
     * Get fake data of ConsumidorOpcaoCulinaria
     *
     * @param array $postFields
     * @return array
     */
    public function fakeConsumidorOpcaoCulinariaData($consumidorOpcaoCulinariaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idconsumidor' => $fake->word,
            'idopcaoculinaria' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $consumidorOpcaoCulinariaFields);
    }
}

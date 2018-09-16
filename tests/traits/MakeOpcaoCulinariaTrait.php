<?php

use Faker\Factory as Faker;
use App\Models\OpcaoCulinaria;
use App\Repositories\OpcaoCulinariaRepository;

trait MakeOpcaoCulinariaTrait
{
    /**
     * Create fake instance of OpcaoCulinaria and save it in database
     *
     * @param array $opcaoCulinariaFields
     * @return OpcaoCulinaria
     */
    public function makeOpcaoCulinaria($opcaoCulinariaFields = [])
    {
        /** @var OpcaoCulinariaRepository $opcaoCulinariaRepo */
        $opcaoCulinariaRepo = App::make(OpcaoCulinariaRepository::class);
        $theme = $this->fakeOpcaoCulinariaData($opcaoCulinariaFields);
        return $opcaoCulinariaRepo->create($theme);
    }

    /**
     * Get fake instance of OpcaoCulinaria
     *
     * @param array $opcaoCulinariaFields
     * @return OpcaoCulinaria
     */
    public function fakeOpcaoCulinaria($opcaoCulinariaFields = [])
    {
        return new OpcaoCulinaria($this->fakeOpcaoCulinariaData($opcaoCulinariaFields));
    }

    /**
     * Get fake data of OpcaoCulinaria
     *
     * @param array $postFields
     * @return array
     */
    public function fakeOpcaoCulinariaData($opcaoCulinariaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'descricao' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $opcaoCulinariaFields);
    }
}

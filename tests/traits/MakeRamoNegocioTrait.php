<?php

use Faker\Factory as Faker;
use App\Models\RamoNegocio;
use App\Repositories\RamoNegocioRepository;

trait MakeRamoNegocioTrait
{
    /**
     * Create fake instance of RamoNegocio and save it in database
     *
     * @param array $ramoNegocioFields
     * @return RamoNegocio
     */
    public function makeRamoNegocio($ramoNegocioFields = [])
    {
        /** @var RamoNegocioRepository $ramoNegocioRepo */
        $ramoNegocioRepo = App::make(RamoNegocioRepository::class);
        $theme = $this->fakeRamoNegocioData($ramoNegocioFields);
        return $ramoNegocioRepo->create($theme);
    }

    /**
     * Get fake instance of RamoNegocio
     *
     * @param array $ramoNegocioFields
     * @return RamoNegocio
     */
    public function fakeRamoNegocio($ramoNegocioFields = [])
    {
        return new RamoNegocio($this->fakeRamoNegocioData($ramoNegocioFields));
    }

    /**
     * Get fake data of RamoNegocio
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRamoNegocioData($ramoNegocioFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'descricao' => $fake->word,
            'nome' => $fake->word,
            'ativo' => $fake->word,
            'exigenrconvidados' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $ramoNegocioFields);
    }
}

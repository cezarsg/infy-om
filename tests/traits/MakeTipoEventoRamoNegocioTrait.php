<?php

use Faker\Factory as Faker;
use App\Models\TipoEventoRamoNegocio;
use App\Repositories\TipoEventoRamoNegocioRepository;

trait MakeTipoEventoRamoNegocioTrait
{
    /**
     * Create fake instance of TipoEventoRamoNegocio and save it in database
     *
     * @param array $tipoEventoRamoNegocioFields
     * @return TipoEventoRamoNegocio
     */
    public function makeTipoEventoRamoNegocio($tipoEventoRamoNegocioFields = [])
    {
        /** @var TipoEventoRamoNegocioRepository $tipoEventoRamoNegocioRepo */
        $tipoEventoRamoNegocioRepo = App::make(TipoEventoRamoNegocioRepository::class);
        $theme = $this->fakeTipoEventoRamoNegocioData($tipoEventoRamoNegocioFields);
        return $tipoEventoRamoNegocioRepo->create($theme);
    }

    /**
     * Get fake instance of TipoEventoRamoNegocio
     *
     * @param array $tipoEventoRamoNegocioFields
     * @return TipoEventoRamoNegocio
     */
    public function fakeTipoEventoRamoNegocio($tipoEventoRamoNegocioFields = [])
    {
        return new TipoEventoRamoNegocio($this->fakeTipoEventoRamoNegocioData($tipoEventoRamoNegocioFields));
    }

    /**
     * Get fake data of TipoEventoRamoNegocio
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTipoEventoRamoNegocioData($tipoEventoRamoNegocioFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idtipoevento' => $fake->word,
            'idramonegocio' => $fake->word,
            'idgrauservico' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $tipoEventoRamoNegocioFields);
    }
}

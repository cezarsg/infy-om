<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TipoEventoRamoNegocioApiTest extends TestCase
{
    use MakeTipoEventoRamoNegocioTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTipoEventoRamoNegocio()
    {
        $tipoEventoRamoNegocio = $this->fakeTipoEventoRamoNegocioData();
        $this->json('POST', '/api/v1/tipoEventoRamoNegocios', $tipoEventoRamoNegocio);

        $this->assertApiResponse($tipoEventoRamoNegocio);
    }

    /**
     * @test
     */
    public function testReadTipoEventoRamoNegocio()
    {
        $tipoEventoRamoNegocio = $this->makeTipoEventoRamoNegocio();
        $this->json('GET', '/api/v1/tipoEventoRamoNegocios/'.$tipoEventoRamoNegocio->id);

        $this->assertApiResponse($tipoEventoRamoNegocio->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTipoEventoRamoNegocio()
    {
        $tipoEventoRamoNegocio = $this->makeTipoEventoRamoNegocio();
        $editedTipoEventoRamoNegocio = $this->fakeTipoEventoRamoNegocioData();

        $this->json('PUT', '/api/v1/tipoEventoRamoNegocios/'.$tipoEventoRamoNegocio->id, $editedTipoEventoRamoNegocio);

        $this->assertApiResponse($editedTipoEventoRamoNegocio);
    }

    /**
     * @test
     */
    public function testDeleteTipoEventoRamoNegocio()
    {
        $tipoEventoRamoNegocio = $this->makeTipoEventoRamoNegocio();
        $this->json('DELETE', '/api/v1/tipoEventoRamoNegocios/'.$tipoEventoRamoNegocio->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tipoEventoRamoNegocios/'.$tipoEventoRamoNegocio->id);

        $this->assertResponseStatus(404);
    }
}

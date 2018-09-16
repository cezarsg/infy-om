<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RamoNegocioApiTest extends TestCase
{
    use MakeRamoNegocioTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRamoNegocio()
    {
        $ramoNegocio = $this->fakeRamoNegocioData();
        $this->json('POST', '/api/v1/ramoNegocios', $ramoNegocio);

        $this->assertApiResponse($ramoNegocio);
    }

    /**
     * @test
     */
    public function testReadRamoNegocio()
    {
        $ramoNegocio = $this->makeRamoNegocio();
        $this->json('GET', '/api/v1/ramoNegocios/'.$ramoNegocio->id);

        $this->assertApiResponse($ramoNegocio->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRamoNegocio()
    {
        $ramoNegocio = $this->makeRamoNegocio();
        $editedRamoNegocio = $this->fakeRamoNegocioData();

        $this->json('PUT', '/api/v1/ramoNegocios/'.$ramoNegocio->id, $editedRamoNegocio);

        $this->assertApiResponse($editedRamoNegocio);
    }

    /**
     * @test
     */
    public function testDeleteRamoNegocio()
    {
        $ramoNegocio = $this->makeRamoNegocio();
        $this->json('DELETE', '/api/v1/ramoNegocios/'.$ramoNegocio->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/ramoNegocios/'.$ramoNegocio->id);

        $this->assertResponseStatus(404);
    }
}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EstiloMusicalApiTest extends TestCase
{
    use MakeEstiloMusicalTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEstiloMusical()
    {
        $estiloMusical = $this->fakeEstiloMusicalData();
        $this->json('POST', '/api/v1/estiloMusicals', $estiloMusical);

        $this->assertApiResponse($estiloMusical);
    }

    /**
     * @test
     */
    public function testReadEstiloMusical()
    {
        $estiloMusical = $this->makeEstiloMusical();
        $this->json('GET', '/api/v1/estiloMusicals/'.$estiloMusical->id);

        $this->assertApiResponse($estiloMusical->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEstiloMusical()
    {
        $estiloMusical = $this->makeEstiloMusical();
        $editedEstiloMusical = $this->fakeEstiloMusicalData();

        $this->json('PUT', '/api/v1/estiloMusicals/'.$estiloMusical->id, $editedEstiloMusical);

        $this->assertApiResponse($editedEstiloMusical);
    }

    /**
     * @test
     */
    public function testDeleteEstiloMusical()
    {
        $estiloMusical = $this->makeEstiloMusical();
        $this->json('DELETE', '/api/v1/estiloMusicals/'.$estiloMusical->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/estiloMusicals/'.$estiloMusical->id);

        $this->assertResponseStatus(404);
    }
}

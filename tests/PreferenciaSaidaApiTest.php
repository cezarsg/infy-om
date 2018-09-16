<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PreferenciaSaidaApiTest extends TestCase
{
    use MakePreferenciaSaidaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePreferenciaSaida()
    {
        $preferenciaSaida = $this->fakePreferenciaSaidaData();
        $this->json('POST', '/api/v1/preferenciaSaidas', $preferenciaSaida);

        $this->assertApiResponse($preferenciaSaida);
    }

    /**
     * @test
     */
    public function testReadPreferenciaSaida()
    {
        $preferenciaSaida = $this->makePreferenciaSaida();
        $this->json('GET', '/api/v1/preferenciaSaidas/'.$preferenciaSaida->id);

        $this->assertApiResponse($preferenciaSaida->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePreferenciaSaida()
    {
        $preferenciaSaida = $this->makePreferenciaSaida();
        $editedPreferenciaSaida = $this->fakePreferenciaSaidaData();

        $this->json('PUT', '/api/v1/preferenciaSaidas/'.$preferenciaSaida->id, $editedPreferenciaSaida);

        $this->assertApiResponse($editedPreferenciaSaida);
    }

    /**
     * @test
     */
    public function testDeletePreferenciaSaida()
    {
        $preferenciaSaida = $this->makePreferenciaSaida();
        $this->json('DELETE', '/api/v1/preferenciaSaidas/'.$preferenciaSaida->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/preferenciaSaidas/'.$preferenciaSaida->id);

        $this->assertResponseStatus(404);
    }
}

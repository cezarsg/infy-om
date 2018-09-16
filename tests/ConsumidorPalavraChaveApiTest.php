<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConsumidorPalavraChaveApiTest extends TestCase
{
    use MakeConsumidorPalavraChaveTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateConsumidorPalavraChave()
    {
        $consumidorPalavraChave = $this->fakeConsumidorPalavraChaveData();
        $this->json('POST', '/api/v1/consumidorPalavraChaves', $consumidorPalavraChave);

        $this->assertApiResponse($consumidorPalavraChave);
    }

    /**
     * @test
     */
    public function testReadConsumidorPalavraChave()
    {
        $consumidorPalavraChave = $this->makeConsumidorPalavraChave();
        $this->json('GET', '/api/v1/consumidorPalavraChaves/'.$consumidorPalavraChave->id);

        $this->assertApiResponse($consumidorPalavraChave->toArray());
    }

    /**
     * @test
     */
    public function testUpdateConsumidorPalavraChave()
    {
        $consumidorPalavraChave = $this->makeConsumidorPalavraChave();
        $editedConsumidorPalavraChave = $this->fakeConsumidorPalavraChaveData();

        $this->json('PUT', '/api/v1/consumidorPalavraChaves/'.$consumidorPalavraChave->id, $editedConsumidorPalavraChave);

        $this->assertApiResponse($editedConsumidorPalavraChave);
    }

    /**
     * @test
     */
    public function testDeleteConsumidorPalavraChave()
    {
        $consumidorPalavraChave = $this->makeConsumidorPalavraChave();
        $this->json('DELETE', '/api/v1/consumidorPalavraChaves/'.$consumidorPalavraChave->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/consumidorPalavraChaves/'.$consumidorPalavraChave->id);

        $this->assertResponseStatus(404);
    }
}

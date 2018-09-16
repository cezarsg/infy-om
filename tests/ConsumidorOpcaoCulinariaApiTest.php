<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConsumidorOpcaoCulinariaApiTest extends TestCase
{
    use MakeConsumidorOpcaoCulinariaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateConsumidorOpcaoCulinaria()
    {
        $consumidorOpcaoCulinaria = $this->fakeConsumidorOpcaoCulinariaData();
        $this->json('POST', '/api/v1/consumidorOpcaoCulinarias', $consumidorOpcaoCulinaria);

        $this->assertApiResponse($consumidorOpcaoCulinaria);
    }

    /**
     * @test
     */
    public function testReadConsumidorOpcaoCulinaria()
    {
        $consumidorOpcaoCulinaria = $this->makeConsumidorOpcaoCulinaria();
        $this->json('GET', '/api/v1/consumidorOpcaoCulinarias/'.$consumidorOpcaoCulinaria->id);

        $this->assertApiResponse($consumidorOpcaoCulinaria->toArray());
    }

    /**
     * @test
     */
    public function testUpdateConsumidorOpcaoCulinaria()
    {
        $consumidorOpcaoCulinaria = $this->makeConsumidorOpcaoCulinaria();
        $editedConsumidorOpcaoCulinaria = $this->fakeConsumidorOpcaoCulinariaData();

        $this->json('PUT', '/api/v1/consumidorOpcaoCulinarias/'.$consumidorOpcaoCulinaria->id, $editedConsumidorOpcaoCulinaria);

        $this->assertApiResponse($editedConsumidorOpcaoCulinaria);
    }

    /**
     * @test
     */
    public function testDeleteConsumidorOpcaoCulinaria()
    {
        $consumidorOpcaoCulinaria = $this->makeConsumidorOpcaoCulinaria();
        $this->json('DELETE', '/api/v1/consumidorOpcaoCulinarias/'.$consumidorOpcaoCulinaria->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/consumidorOpcaoCulinarias/'.$consumidorOpcaoCulinaria->id);

        $this->assertResponseStatus(404);
    }
}

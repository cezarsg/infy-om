<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConsumidorHistoricoApiTest extends TestCase
{
    use MakeConsumidorHistoricoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateConsumidorHistorico()
    {
        $consumidorHistorico = $this->fakeConsumidorHistoricoData();
        $this->json('POST', '/api/v1/consumidorHistoricos', $consumidorHistorico);

        $this->assertApiResponse($consumidorHistorico);
    }

    /**
     * @test
     */
    public function testReadConsumidorHistorico()
    {
        $consumidorHistorico = $this->makeConsumidorHistorico();
        $this->json('GET', '/api/v1/consumidorHistoricos/'.$consumidorHistorico->id);

        $this->assertApiResponse($consumidorHistorico->toArray());
    }

    /**
     * @test
     */
    public function testUpdateConsumidorHistorico()
    {
        $consumidorHistorico = $this->makeConsumidorHistorico();
        $editedConsumidorHistorico = $this->fakeConsumidorHistoricoData();

        $this->json('PUT', '/api/v1/consumidorHistoricos/'.$consumidorHistorico->id, $editedConsumidorHistorico);

        $this->assertApiResponse($editedConsumidorHistorico);
    }

    /**
     * @test
     */
    public function testDeleteConsumidorHistorico()
    {
        $consumidorHistorico = $this->makeConsumidorHistorico();
        $this->json('DELETE', '/api/v1/consumidorHistoricos/'.$consumidorHistorico->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/consumidorHistoricos/'.$consumidorHistorico->id);

        $this->assertResponseStatus(404);
    }
}

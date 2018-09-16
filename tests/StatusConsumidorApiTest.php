<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatusConsumidorApiTest extends TestCase
{
    use MakeStatusConsumidorTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateStatusConsumidor()
    {
        $statusConsumidor = $this->fakeStatusConsumidorData();
        $this->json('POST', '/api/v1/statusConsumidors', $statusConsumidor);

        $this->assertApiResponse($statusConsumidor);
    }

    /**
     * @test
     */
    public function testReadStatusConsumidor()
    {
        $statusConsumidor = $this->makeStatusConsumidor();
        $this->json('GET', '/api/v1/statusConsumidors/'.$statusConsumidor->id);

        $this->assertApiResponse($statusConsumidor->toArray());
    }

    /**
     * @test
     */
    public function testUpdateStatusConsumidor()
    {
        $statusConsumidor = $this->makeStatusConsumidor();
        $editedStatusConsumidor = $this->fakeStatusConsumidorData();

        $this->json('PUT', '/api/v1/statusConsumidors/'.$statusConsumidor->id, $editedStatusConsumidor);

        $this->assertApiResponse($editedStatusConsumidor);
    }

    /**
     * @test
     */
    public function testDeleteStatusConsumidor()
    {
        $statusConsumidor = $this->makeStatusConsumidor();
        $this->json('DELETE', '/api/v1/statusConsumidors/'.$statusConsumidor->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/statusConsumidors/'.$statusConsumidor->id);

        $this->assertResponseStatus(404);
    }
}

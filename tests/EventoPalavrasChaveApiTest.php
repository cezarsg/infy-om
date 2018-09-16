<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventoPalavrasChaveApiTest extends TestCase
{
    use MakeEventoPalavrasChaveTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEventoPalavrasChave()
    {
        $eventoPalavrasChave = $this->fakeEventoPalavrasChaveData();
        $this->json('POST', '/api/v1/eventoPalavrasChaves', $eventoPalavrasChave);

        $this->assertApiResponse($eventoPalavrasChave);
    }

    /**
     * @test
     */
    public function testReadEventoPalavrasChave()
    {
        $eventoPalavrasChave = $this->makeEventoPalavrasChave();
        $this->json('GET', '/api/v1/eventoPalavrasChaves/'.$eventoPalavrasChave->id);

        $this->assertApiResponse($eventoPalavrasChave->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEventoPalavrasChave()
    {
        $eventoPalavrasChave = $this->makeEventoPalavrasChave();
        $editedEventoPalavrasChave = $this->fakeEventoPalavrasChaveData();

        $this->json('PUT', '/api/v1/eventoPalavrasChaves/'.$eventoPalavrasChave->id, $editedEventoPalavrasChave);

        $this->assertApiResponse($editedEventoPalavrasChave);
    }

    /**
     * @test
     */
    public function testDeleteEventoPalavrasChave()
    {
        $eventoPalavrasChave = $this->makeEventoPalavrasChave();
        $this->json('DELETE', '/api/v1/eventoPalavrasChaves/'.$eventoPalavrasChave->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/eventoPalavrasChaves/'.$eventoPalavrasChave->id);

        $this->assertResponseStatus(404);
    }
}

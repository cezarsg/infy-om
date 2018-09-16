<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatusEventoApiTest extends TestCase
{
    use MakeStatusEventoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateStatusEvento()
    {
        $statusEvento = $this->fakeStatusEventoData();
        $this->json('POST', '/api/v1/statusEventos', $statusEvento);

        $this->assertApiResponse($statusEvento);
    }

    /**
     * @test
     */
    public function testReadStatusEvento()
    {
        $statusEvento = $this->makeStatusEvento();
        $this->json('GET', '/api/v1/statusEventos/'.$statusEvento->id);

        $this->assertApiResponse($statusEvento->toArray());
    }

    /**
     * @test
     */
    public function testUpdateStatusEvento()
    {
        $statusEvento = $this->makeStatusEvento();
        $editedStatusEvento = $this->fakeStatusEventoData();

        $this->json('PUT', '/api/v1/statusEventos/'.$statusEvento->id, $editedStatusEvento);

        $this->assertApiResponse($editedStatusEvento);
    }

    /**
     * @test
     */
    public function testDeleteStatusEvento()
    {
        $statusEvento = $this->makeStatusEvento();
        $this->json('DELETE', '/api/v1/statusEventos/'.$statusEvento->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/statusEventos/'.$statusEvento->id);

        $this->assertResponseStatus(404);
    }
}

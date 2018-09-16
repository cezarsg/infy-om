<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventoHistoricoApiTest extends TestCase
{
    use MakeEventoHistoricoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEventoHistorico()
    {
        $eventoHistorico = $this->fakeEventoHistoricoData();
        $this->json('POST', '/api/v1/eventoHistoricos', $eventoHistorico);

        $this->assertApiResponse($eventoHistorico);
    }

    /**
     * @test
     */
    public function testReadEventoHistorico()
    {
        $eventoHistorico = $this->makeEventoHistorico();
        $this->json('GET', '/api/v1/eventoHistoricos/'.$eventoHistorico->id);

        $this->assertApiResponse($eventoHistorico->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEventoHistorico()
    {
        $eventoHistorico = $this->makeEventoHistorico();
        $editedEventoHistorico = $this->fakeEventoHistoricoData();

        $this->json('PUT', '/api/v1/eventoHistoricos/'.$eventoHistorico->id, $editedEventoHistorico);

        $this->assertApiResponse($editedEventoHistorico);
    }

    /**
     * @test
     */
    public function testDeleteEventoHistorico()
    {
        $eventoHistorico = $this->makeEventoHistorico();
        $this->json('DELETE', '/api/v1/eventoHistoricos/'.$eventoHistorico->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/eventoHistoricos/'.$eventoHistorico->id);

        $this->assertResponseStatus(404);
    }
}

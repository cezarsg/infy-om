<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventoServicoApiTest extends TestCase
{
    use MakeEventoServicoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEventoServico()
    {
        $eventoServico = $this->fakeEventoServicoData();
        $this->json('POST', '/api/v1/eventoServicos', $eventoServico);

        $this->assertApiResponse($eventoServico);
    }

    /**
     * @test
     */
    public function testReadEventoServico()
    {
        $eventoServico = $this->makeEventoServico();
        $this->json('GET', '/api/v1/eventoServicos/'.$eventoServico->id);

        $this->assertApiResponse($eventoServico->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEventoServico()
    {
        $eventoServico = $this->makeEventoServico();
        $editedEventoServico = $this->fakeEventoServicoData();

        $this->json('PUT', '/api/v1/eventoServicos/'.$eventoServico->id, $editedEventoServico);

        $this->assertApiResponse($editedEventoServico);
    }

    /**
     * @test
     */
    public function testDeleteEventoServico()
    {
        $eventoServico = $this->makeEventoServico();
        $this->json('DELETE', '/api/v1/eventoServicos/'.$eventoServico->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/eventoServicos/'.$eventoServico->id);

        $this->assertResponseStatus(404);
    }
}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventoConvidadosApiTest extends TestCase
{
    use MakeEventoConvidadosTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEventoConvidados()
    {
        $eventoConvidados = $this->fakeEventoConvidadosData();
        $this->json('POST', '/api/v1/eventoConvidados', $eventoConvidados);

        $this->assertApiResponse($eventoConvidados);
    }

    /**
     * @test
     */
    public function testReadEventoConvidados()
    {
        $eventoConvidados = $this->makeEventoConvidados();
        $this->json('GET', '/api/v1/eventoConvidados/'.$eventoConvidados->id);

        $this->assertApiResponse($eventoConvidados->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEventoConvidados()
    {
        $eventoConvidados = $this->makeEventoConvidados();
        $editedEventoConvidados = $this->fakeEventoConvidadosData();

        $this->json('PUT', '/api/v1/eventoConvidados/'.$eventoConvidados->id, $editedEventoConvidados);

        $this->assertApiResponse($editedEventoConvidados);
    }

    /**
     * @test
     */
    public function testDeleteEventoConvidados()
    {
        $eventoConvidados = $this->makeEventoConvidados();
        $this->json('DELETE', '/api/v1/eventoConvidados/'.$eventoConvidados->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/eventoConvidados/'.$eventoConvidados->id);

        $this->assertResponseStatus(404);
    }
}

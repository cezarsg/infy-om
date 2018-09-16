<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventoMesasApiTest extends TestCase
{
    use MakeEventoMesasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEventoMesas()
    {
        $eventoMesas = $this->fakeEventoMesasData();
        $this->json('POST', '/api/v1/eventoMesas', $eventoMesas);

        $this->assertApiResponse($eventoMesas);
    }

    /**
     * @test
     */
    public function testReadEventoMesas()
    {
        $eventoMesas = $this->makeEventoMesas();
        $this->json('GET', '/api/v1/eventoMesas/'.$eventoMesas->id);

        $this->assertApiResponse($eventoMesas->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEventoMesas()
    {
        $eventoMesas = $this->makeEventoMesas();
        $editedEventoMesas = $this->fakeEventoMesasData();

        $this->json('PUT', '/api/v1/eventoMesas/'.$eventoMesas->id, $editedEventoMesas);

        $this->assertApiResponse($editedEventoMesas);
    }

    /**
     * @test
     */
    public function testDeleteEventoMesas()
    {
        $eventoMesas = $this->makeEventoMesas();
        $this->json('DELETE', '/api/v1/eventoMesas/'.$eventoMesas->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/eventoMesas/'.$eventoMesas->id);

        $this->assertResponseStatus(404);
    }
}

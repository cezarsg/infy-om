<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventoPublicoAlvoApiTest extends TestCase
{
    use MakeEventoPublicoAlvoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEventoPublicoAlvo()
    {
        $eventoPublicoAlvo = $this->fakeEventoPublicoAlvoData();
        $this->json('POST', '/api/v1/eventoPublicoAlvos', $eventoPublicoAlvo);

        $this->assertApiResponse($eventoPublicoAlvo);
    }

    /**
     * @test
     */
    public function testReadEventoPublicoAlvo()
    {
        $eventoPublicoAlvo = $this->makeEventoPublicoAlvo();
        $this->json('GET', '/api/v1/eventoPublicoAlvos/'.$eventoPublicoAlvo->id);

        $this->assertApiResponse($eventoPublicoAlvo->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEventoPublicoAlvo()
    {
        $eventoPublicoAlvo = $this->makeEventoPublicoAlvo();
        $editedEventoPublicoAlvo = $this->fakeEventoPublicoAlvoData();

        $this->json('PUT', '/api/v1/eventoPublicoAlvos/'.$eventoPublicoAlvo->id, $editedEventoPublicoAlvo);

        $this->assertApiResponse($editedEventoPublicoAlvo);
    }

    /**
     * @test
     */
    public function testDeleteEventoPublicoAlvo()
    {
        $eventoPublicoAlvo = $this->makeEventoPublicoAlvo();
        $this->json('DELETE', '/api/v1/eventoPublicoAlvos/'.$eventoPublicoAlvo->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/eventoPublicoAlvos/'.$eventoPublicoAlvo->id);

        $this->assertResponseStatus(404);
    }
}

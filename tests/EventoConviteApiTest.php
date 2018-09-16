<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventoConviteApiTest extends TestCase
{
    use MakeEventoConviteTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateEventoConvite()
    {
        $eventoConvite = $this->fakeEventoConviteData();
        $this->json('POST', '/api/v1/eventoConvites', $eventoConvite);

        $this->assertApiResponse($eventoConvite);
    }

    /**
     * @test
     */
    public function testReadEventoConvite()
    {
        $eventoConvite = $this->makeEventoConvite();
        $this->json('GET', '/api/v1/eventoConvites/'.$eventoConvite->id);

        $this->assertApiResponse($eventoConvite->toArray());
    }

    /**
     * @test
     */
    public function testUpdateEventoConvite()
    {
        $eventoConvite = $this->makeEventoConvite();
        $editedEventoConvite = $this->fakeEventoConviteData();

        $this->json('PUT', '/api/v1/eventoConvites/'.$eventoConvite->id, $editedEventoConvite);

        $this->assertApiResponse($editedEventoConvite);
    }

    /**
     * @test
     */
    public function testDeleteEventoConvite()
    {
        $eventoConvite = $this->makeEventoConvite();
        $this->json('DELETE', '/api/v1/eventoConvites/'.$eventoConvite->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/eventoConvites/'.$eventoConvite->id);

        $this->assertResponseStatus(404);
    }
}

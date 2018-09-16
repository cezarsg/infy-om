<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TipoEventoApiTest extends TestCase
{
    use MakeTipoEventoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTipoEvento()
    {
        $tipoEvento = $this->fakeTipoEventoData();
        $this->json('POST', '/api/v1/tipoEventos', $tipoEvento);

        $this->assertApiResponse($tipoEvento);
    }

    /**
     * @test
     */
    public function testReadTipoEvento()
    {
        $tipoEvento = $this->makeTipoEvento();
        $this->json('GET', '/api/v1/tipoEventos/'.$tipoEvento->id);

        $this->assertApiResponse($tipoEvento->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTipoEvento()
    {
        $tipoEvento = $this->makeTipoEvento();
        $editedTipoEvento = $this->fakeTipoEventoData();

        $this->json('PUT', '/api/v1/tipoEventos/'.$tipoEvento->id, $editedTipoEvento);

        $this->assertApiResponse($editedTipoEvento);
    }

    /**
     * @test
     */
    public function testDeleteTipoEvento()
    {
        $tipoEvento = $this->makeTipoEvento();
        $this->json('DELETE', '/api/v1/tipoEventos/'.$tipoEvento->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tipoEventos/'.$tipoEvento->id);

        $this->assertResponseStatus(404);
    }
}

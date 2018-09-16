<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PaginaEventoApiTest extends TestCase
{
    use MakePaginaEventoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePaginaEvento()
    {
        $paginaEvento = $this->fakePaginaEventoData();
        $this->json('POST', '/api/v1/paginaEventos', $paginaEvento);

        $this->assertApiResponse($paginaEvento);
    }

    /**
     * @test
     */
    public function testReadPaginaEvento()
    {
        $paginaEvento = $this->makePaginaEvento();
        $this->json('GET', '/api/v1/paginaEventos/'.$paginaEvento->id);

        $this->assertApiResponse($paginaEvento->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePaginaEvento()
    {
        $paginaEvento = $this->makePaginaEvento();
        $editedPaginaEvento = $this->fakePaginaEventoData();

        $this->json('PUT', '/api/v1/paginaEventos/'.$paginaEvento->id, $editedPaginaEvento);

        $this->assertApiResponse($editedPaginaEvento);
    }

    /**
     * @test
     */
    public function testDeletePaginaEvento()
    {
        $paginaEvento = $this->makePaginaEvento();
        $this->json('DELETE', '/api/v1/paginaEventos/'.$paginaEvento->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/paginaEventos/'.$paginaEvento->id);

        $this->assertResponseStatus(404);
    }
}

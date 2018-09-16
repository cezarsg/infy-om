<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PaginaEventoRecadoApiTest extends TestCase
{
    use MakePaginaEventoRecadoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePaginaEventoRecado()
    {
        $paginaEventoRecado = $this->fakePaginaEventoRecadoData();
        $this->json('POST', '/api/v1/paginaEventoRecados', $paginaEventoRecado);

        $this->assertApiResponse($paginaEventoRecado);
    }

    /**
     * @test
     */
    public function testReadPaginaEventoRecado()
    {
        $paginaEventoRecado = $this->makePaginaEventoRecado();
        $this->json('GET', '/api/v1/paginaEventoRecados/'.$paginaEventoRecado->id);

        $this->assertApiResponse($paginaEventoRecado->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePaginaEventoRecado()
    {
        $paginaEventoRecado = $this->makePaginaEventoRecado();
        $editedPaginaEventoRecado = $this->fakePaginaEventoRecadoData();

        $this->json('PUT', '/api/v1/paginaEventoRecados/'.$paginaEventoRecado->id, $editedPaginaEventoRecado);

        $this->assertApiResponse($editedPaginaEventoRecado);
    }

    /**
     * @test
     */
    public function testDeletePaginaEventoRecado()
    {
        $paginaEventoRecado = $this->makePaginaEventoRecado();
        $this->json('DELETE', '/api/v1/paginaEventoRecados/'.$paginaEventoRecado->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/paginaEventoRecados/'.$paginaEventoRecado->id);

        $this->assertResponseStatus(404);
    }
}

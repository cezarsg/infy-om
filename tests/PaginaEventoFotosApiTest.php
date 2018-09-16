<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PaginaEventoFotosApiTest extends TestCase
{
    use MakePaginaEventoFotosTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePaginaEventoFotos()
    {
        $paginaEventoFotos = $this->fakePaginaEventoFotosData();
        $this->json('POST', '/api/v1/paginaEventoFotos', $paginaEventoFotos);

        $this->assertApiResponse($paginaEventoFotos);
    }

    /**
     * @test
     */
    public function testReadPaginaEventoFotos()
    {
        $paginaEventoFotos = $this->makePaginaEventoFotos();
        $this->json('GET', '/api/v1/paginaEventoFotos/'.$paginaEventoFotos->id);

        $this->assertApiResponse($paginaEventoFotos->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePaginaEventoFotos()
    {
        $paginaEventoFotos = $this->makePaginaEventoFotos();
        $editedPaginaEventoFotos = $this->fakePaginaEventoFotosData();

        $this->json('PUT', '/api/v1/paginaEventoFotos/'.$paginaEventoFotos->id, $editedPaginaEventoFotos);

        $this->assertApiResponse($editedPaginaEventoFotos);
    }

    /**
     * @test
     */
    public function testDeletePaginaEventoFotos()
    {
        $paginaEventoFotos = $this->makePaginaEventoFotos();
        $this->json('DELETE', '/api/v1/paginaEventoFotos/'.$paginaEventoFotos->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/paginaEventoFotos/'.$paginaEventoFotos->id);

        $this->assertResponseStatus(404);
    }
}

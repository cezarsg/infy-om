<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnuncioFotosApiTest extends TestCase
{
    use MakeAnuncioFotosTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAnuncioFotos()
    {
        $anuncioFotos = $this->fakeAnuncioFotosData();
        $this->json('POST', '/api/v1/anuncioFotos', $anuncioFotos);

        $this->assertApiResponse($anuncioFotos);
    }

    /**
     * @test
     */
    public function testReadAnuncioFotos()
    {
        $anuncioFotos = $this->makeAnuncioFotos();
        $this->json('GET', '/api/v1/anuncioFotos/'.$anuncioFotos->id);

        $this->assertApiResponse($anuncioFotos->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAnuncioFotos()
    {
        $anuncioFotos = $this->makeAnuncioFotos();
        $editedAnuncioFotos = $this->fakeAnuncioFotosData();

        $this->json('PUT', '/api/v1/anuncioFotos/'.$anuncioFotos->id, $editedAnuncioFotos);

        $this->assertApiResponse($editedAnuncioFotos);
    }

    /**
     * @test
     */
    public function testDeleteAnuncioFotos()
    {
        $anuncioFotos = $this->makeAnuncioFotos();
        $this->json('DELETE', '/api/v1/anuncioFotos/'.$anuncioFotos->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/anuncioFotos/'.$anuncioFotos->id);

        $this->assertResponseStatus(404);
    }
}

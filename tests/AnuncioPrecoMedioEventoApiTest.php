<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnuncioPrecoMedioEventoApiTest extends TestCase
{
    use MakeAnuncioPrecoMedioEventoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAnuncioPrecoMedioEvento()
    {
        $anuncioPrecoMedioEvento = $this->fakeAnuncioPrecoMedioEventoData();
        $this->json('POST', '/api/v1/anuncioPrecoMedioEventos', $anuncioPrecoMedioEvento);

        $this->assertApiResponse($anuncioPrecoMedioEvento);
    }

    /**
     * @test
     */
    public function testReadAnuncioPrecoMedioEvento()
    {
        $anuncioPrecoMedioEvento = $this->makeAnuncioPrecoMedioEvento();
        $this->json('GET', '/api/v1/anuncioPrecoMedioEventos/'.$anuncioPrecoMedioEvento->id);

        $this->assertApiResponse($anuncioPrecoMedioEvento->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAnuncioPrecoMedioEvento()
    {
        $anuncioPrecoMedioEvento = $this->makeAnuncioPrecoMedioEvento();
        $editedAnuncioPrecoMedioEvento = $this->fakeAnuncioPrecoMedioEventoData();

        $this->json('PUT', '/api/v1/anuncioPrecoMedioEventos/'.$anuncioPrecoMedioEvento->id, $editedAnuncioPrecoMedioEvento);

        $this->assertApiResponse($editedAnuncioPrecoMedioEvento);
    }

    /**
     * @test
     */
    public function testDeleteAnuncioPrecoMedioEvento()
    {
        $anuncioPrecoMedioEvento = $this->makeAnuncioPrecoMedioEvento();
        $this->json('DELETE', '/api/v1/anuncioPrecoMedioEventos/'.$anuncioPrecoMedioEvento->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/anuncioPrecoMedioEventos/'.$anuncioPrecoMedioEvento->id);

        $this->assertResponseStatus(404);
    }
}

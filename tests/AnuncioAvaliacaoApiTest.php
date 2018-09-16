<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnuncioAvaliacaoApiTest extends TestCase
{
    use MakeAnuncioAvaliacaoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAnuncioAvaliacao()
    {
        $anuncioAvaliacao = $this->fakeAnuncioAvaliacaoData();
        $this->json('POST', '/api/v1/anuncioAvaliacaos', $anuncioAvaliacao);

        $this->assertApiResponse($anuncioAvaliacao);
    }

    /**
     * @test
     */
    public function testReadAnuncioAvaliacao()
    {
        $anuncioAvaliacao = $this->makeAnuncioAvaliacao();
        $this->json('GET', '/api/v1/anuncioAvaliacaos/'.$anuncioAvaliacao->id);

        $this->assertApiResponse($anuncioAvaliacao->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAnuncioAvaliacao()
    {
        $anuncioAvaliacao = $this->makeAnuncioAvaliacao();
        $editedAnuncioAvaliacao = $this->fakeAnuncioAvaliacaoData();

        $this->json('PUT', '/api/v1/anuncioAvaliacaos/'.$anuncioAvaliacao->id, $editedAnuncioAvaliacao);

        $this->assertApiResponse($editedAnuncioAvaliacao);
    }

    /**
     * @test
     */
    public function testDeleteAnuncioAvaliacao()
    {
        $anuncioAvaliacao = $this->makeAnuncioAvaliacao();
        $this->json('DELETE', '/api/v1/anuncioAvaliacaos/'.$anuncioAvaliacao->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/anuncioAvaliacaos/'.$anuncioAvaliacao->id);

        $this->assertResponseStatus(404);
    }
}

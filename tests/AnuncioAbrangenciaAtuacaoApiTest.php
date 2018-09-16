<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnuncioAbrangenciaAtuacaoApiTest extends TestCase
{
    use MakeAnuncioAbrangenciaAtuacaoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAnuncioAbrangenciaAtuacao()
    {
        $anuncioAbrangenciaAtuacao = $this->fakeAnuncioAbrangenciaAtuacaoData();
        $this->json('POST', '/api/v1/anuncioAbrangenciaAtuacaos', $anuncioAbrangenciaAtuacao);

        $this->assertApiResponse($anuncioAbrangenciaAtuacao);
    }

    /**
     * @test
     */
    public function testReadAnuncioAbrangenciaAtuacao()
    {
        $anuncioAbrangenciaAtuacao = $this->makeAnuncioAbrangenciaAtuacao();
        $this->json('GET', '/api/v1/anuncioAbrangenciaAtuacaos/'.$anuncioAbrangenciaAtuacao->id);

        $this->assertApiResponse($anuncioAbrangenciaAtuacao->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAnuncioAbrangenciaAtuacao()
    {
        $anuncioAbrangenciaAtuacao = $this->makeAnuncioAbrangenciaAtuacao();
        $editedAnuncioAbrangenciaAtuacao = $this->fakeAnuncioAbrangenciaAtuacaoData();

        $this->json('PUT', '/api/v1/anuncioAbrangenciaAtuacaos/'.$anuncioAbrangenciaAtuacao->id, $editedAnuncioAbrangenciaAtuacao);

        $this->assertApiResponse($editedAnuncioAbrangenciaAtuacao);
    }

    /**
     * @test
     */
    public function testDeleteAnuncioAbrangenciaAtuacao()
    {
        $anuncioAbrangenciaAtuacao = $this->makeAnuncioAbrangenciaAtuacao();
        $this->json('DELETE', '/api/v1/anuncioAbrangenciaAtuacaos/'.$anuncioAbrangenciaAtuacao->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/anuncioAbrangenciaAtuacaos/'.$anuncioAbrangenciaAtuacao->id);

        $this->assertResponseStatus(404);
    }
}

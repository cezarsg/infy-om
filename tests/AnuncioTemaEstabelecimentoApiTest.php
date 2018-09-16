<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnuncioTemaEstabelecimentoApiTest extends TestCase
{
    use MakeAnuncioTemaEstabelecimentoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAnuncioTemaEstabelecimento()
    {
        $anuncioTemaEstabelecimento = $this->fakeAnuncioTemaEstabelecimentoData();
        $this->json('POST', '/api/v1/anuncioTemaEstabelecimentos', $anuncioTemaEstabelecimento);

        $this->assertApiResponse($anuncioTemaEstabelecimento);
    }

    /**
     * @test
     */
    public function testReadAnuncioTemaEstabelecimento()
    {
        $anuncioTemaEstabelecimento = $this->makeAnuncioTemaEstabelecimento();
        $this->json('GET', '/api/v1/anuncioTemaEstabelecimentos/'.$anuncioTemaEstabelecimento->id);

        $this->assertApiResponse($anuncioTemaEstabelecimento->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAnuncioTemaEstabelecimento()
    {
        $anuncioTemaEstabelecimento = $this->makeAnuncioTemaEstabelecimento();
        $editedAnuncioTemaEstabelecimento = $this->fakeAnuncioTemaEstabelecimentoData();

        $this->json('PUT', '/api/v1/anuncioTemaEstabelecimentos/'.$anuncioTemaEstabelecimento->id, $editedAnuncioTemaEstabelecimento);

        $this->assertApiResponse($editedAnuncioTemaEstabelecimento);
    }

    /**
     * @test
     */
    public function testDeleteAnuncioTemaEstabelecimento()
    {
        $anuncioTemaEstabelecimento = $this->makeAnuncioTemaEstabelecimento();
        $this->json('DELETE', '/api/v1/anuncioTemaEstabelecimentos/'.$anuncioTemaEstabelecimento->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/anuncioTemaEstabelecimentos/'.$anuncioTemaEstabelecimento->id);

        $this->assertResponseStatus(404);
    }
}

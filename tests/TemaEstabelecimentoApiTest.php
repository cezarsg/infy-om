<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TemaEstabelecimentoApiTest extends TestCase
{
    use MakeTemaEstabelecimentoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTemaEstabelecimento()
    {
        $temaEstabelecimento = $this->fakeTemaEstabelecimentoData();
        $this->json('POST', '/api/v1/temaEstabelecimentos', $temaEstabelecimento);

        $this->assertApiResponse($temaEstabelecimento);
    }

    /**
     * @test
     */
    public function testReadTemaEstabelecimento()
    {
        $temaEstabelecimento = $this->makeTemaEstabelecimento();
        $this->json('GET', '/api/v1/temaEstabelecimentos/'.$temaEstabelecimento->id);

        $this->assertApiResponse($temaEstabelecimento->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTemaEstabelecimento()
    {
        $temaEstabelecimento = $this->makeTemaEstabelecimento();
        $editedTemaEstabelecimento = $this->fakeTemaEstabelecimentoData();

        $this->json('PUT', '/api/v1/temaEstabelecimentos/'.$temaEstabelecimento->id, $editedTemaEstabelecimento);

        $this->assertApiResponse($editedTemaEstabelecimento);
    }

    /**
     * @test
     */
    public function testDeleteTemaEstabelecimento()
    {
        $temaEstabelecimento = $this->makeTemaEstabelecimento();
        $this->json('DELETE', '/api/v1/temaEstabelecimentos/'.$temaEstabelecimento->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/temaEstabelecimentos/'.$temaEstabelecimento->id);

        $this->assertResponseStatus(404);
    }
}

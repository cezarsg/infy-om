<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrcamentoMensagensApiTest extends TestCase
{
    use MakeOrcamentoMensagensTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateOrcamentoMensagens()
    {
        $orcamentoMensagens = $this->fakeOrcamentoMensagensData();
        $this->json('POST', '/api/v1/orcamentoMensagens', $orcamentoMensagens);

        $this->assertApiResponse($orcamentoMensagens);
    }

    /**
     * @test
     */
    public function testReadOrcamentoMensagens()
    {
        $orcamentoMensagens = $this->makeOrcamentoMensagens();
        $this->json('GET', '/api/v1/orcamentoMensagens/'.$orcamentoMensagens->id);

        $this->assertApiResponse($orcamentoMensagens->toArray());
    }

    /**
     * @test
     */
    public function testUpdateOrcamentoMensagens()
    {
        $orcamentoMensagens = $this->makeOrcamentoMensagens();
        $editedOrcamentoMensagens = $this->fakeOrcamentoMensagensData();

        $this->json('PUT', '/api/v1/orcamentoMensagens/'.$orcamentoMensagens->id, $editedOrcamentoMensagens);

        $this->assertApiResponse($editedOrcamentoMensagens);
    }

    /**
     * @test
     */
    public function testDeleteOrcamentoMensagens()
    {
        $orcamentoMensagens = $this->makeOrcamentoMensagens();
        $this->json('DELETE', '/api/v1/orcamentoMensagens/'.$orcamentoMensagens->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/orcamentoMensagens/'.$orcamentoMensagens->id);

        $this->assertResponseStatus(404);
    }
}

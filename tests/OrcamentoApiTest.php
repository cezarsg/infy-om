<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrcamentoApiTest extends TestCase
{
    use MakeOrcamentoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateOrcamento()
    {
        $orcamento = $this->fakeOrcamentoData();
        $this->json('POST', '/api/v1/orcamentos', $orcamento);

        $this->assertApiResponse($orcamento);
    }

    /**
     * @test
     */
    public function testReadOrcamento()
    {
        $orcamento = $this->makeOrcamento();
        $this->json('GET', '/api/v1/orcamentos/'.$orcamento->id);

        $this->assertApiResponse($orcamento->toArray());
    }

    /**
     * @test
     */
    public function testUpdateOrcamento()
    {
        $orcamento = $this->makeOrcamento();
        $editedOrcamento = $this->fakeOrcamentoData();

        $this->json('PUT', '/api/v1/orcamentos/'.$orcamento->id, $editedOrcamento);

        $this->assertApiResponse($editedOrcamento);
    }

    /**
     * @test
     */
    public function testDeleteOrcamento()
    {
        $orcamento = $this->makeOrcamento();
        $this->json('DELETE', '/api/v1/orcamentos/'.$orcamento->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/orcamentos/'.$orcamento->id);

        $this->assertResponseStatus(404);
    }
}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrcamentoAvulsoApiTest extends TestCase
{
    use MakeOrcamentoAvulsoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateOrcamentoAvulso()
    {
        $orcamentoAvulso = $this->fakeOrcamentoAvulsoData();
        $this->json('POST', '/api/v1/orcamentoAvulsos', $orcamentoAvulso);

        $this->assertApiResponse($orcamentoAvulso);
    }

    /**
     * @test
     */
    public function testReadOrcamentoAvulso()
    {
        $orcamentoAvulso = $this->makeOrcamentoAvulso();
        $this->json('GET', '/api/v1/orcamentoAvulsos/'.$orcamentoAvulso->id);

        $this->assertApiResponse($orcamentoAvulso->toArray());
    }

    /**
     * @test
     */
    public function testUpdateOrcamentoAvulso()
    {
        $orcamentoAvulso = $this->makeOrcamentoAvulso();
        $editedOrcamentoAvulso = $this->fakeOrcamentoAvulsoData();

        $this->json('PUT', '/api/v1/orcamentoAvulsos/'.$orcamentoAvulso->id, $editedOrcamentoAvulso);

        $this->assertApiResponse($editedOrcamentoAvulso);
    }

    /**
     * @test
     */
    public function testDeleteOrcamentoAvulso()
    {
        $orcamentoAvulso = $this->makeOrcamentoAvulso();
        $this->json('DELETE', '/api/v1/orcamentoAvulsos/'.$orcamentoAvulso->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/orcamentoAvulsos/'.$orcamentoAvulso->id);

        $this->assertResponseStatus(404);
    }
}

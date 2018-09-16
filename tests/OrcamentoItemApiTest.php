<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrcamentoItemApiTest extends TestCase
{
    use MakeOrcamentoItemTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateOrcamentoItem()
    {
        $orcamentoItem = $this->fakeOrcamentoItemData();
        $this->json('POST', '/api/v1/orcamentoItems', $orcamentoItem);

        $this->assertApiResponse($orcamentoItem);
    }

    /**
     * @test
     */
    public function testReadOrcamentoItem()
    {
        $orcamentoItem = $this->makeOrcamentoItem();
        $this->json('GET', '/api/v1/orcamentoItems/'.$orcamentoItem->id);

        $this->assertApiResponse($orcamentoItem->toArray());
    }

    /**
     * @test
     */
    public function testUpdateOrcamentoItem()
    {
        $orcamentoItem = $this->makeOrcamentoItem();
        $editedOrcamentoItem = $this->fakeOrcamentoItemData();

        $this->json('PUT', '/api/v1/orcamentoItems/'.$orcamentoItem->id, $editedOrcamentoItem);

        $this->assertApiResponse($editedOrcamentoItem);
    }

    /**
     * @test
     */
    public function testDeleteOrcamentoItem()
    {
        $orcamentoItem = $this->makeOrcamentoItem();
        $this->json('DELETE', '/api/v1/orcamentoItems/'.$orcamentoItem->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/orcamentoItems/'.$orcamentoItem->id);

        $this->assertResponseStatus(404);
    }
}

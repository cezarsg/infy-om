<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatusOrcamentoApiTest extends TestCase
{
    use MakeStatusOrcamentoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateStatusOrcamento()
    {
        $statusOrcamento = $this->fakeStatusOrcamentoData();
        $this->json('POST', '/api/v1/statusOrcamentos', $statusOrcamento);

        $this->assertApiResponse($statusOrcamento);
    }

    /**
     * @test
     */
    public function testReadStatusOrcamento()
    {
        $statusOrcamento = $this->makeStatusOrcamento();
        $this->json('GET', '/api/v1/statusOrcamentos/'.$statusOrcamento->id);

        $this->assertApiResponse($statusOrcamento->toArray());
    }

    /**
     * @test
     */
    public function testUpdateStatusOrcamento()
    {
        $statusOrcamento = $this->makeStatusOrcamento();
        $editedStatusOrcamento = $this->fakeStatusOrcamentoData();

        $this->json('PUT', '/api/v1/statusOrcamentos/'.$statusOrcamento->id, $editedStatusOrcamento);

        $this->assertApiResponse($editedStatusOrcamento);
    }

    /**
     * @test
     */
    public function testDeleteStatusOrcamento()
    {
        $statusOrcamento = $this->makeStatusOrcamento();
        $this->json('DELETE', '/api/v1/statusOrcamentos/'.$statusOrcamento->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/statusOrcamentos/'.$statusOrcamento->id);

        $this->assertResponseStatus(404);
    }
}

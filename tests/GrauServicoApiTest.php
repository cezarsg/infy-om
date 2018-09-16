<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GrauServicoApiTest extends TestCase
{
    use MakeGrauServicoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateGrauServico()
    {
        $grauServico = $this->fakeGrauServicoData();
        $this->json('POST', '/api/v1/grauServicos', $grauServico);

        $this->assertApiResponse($grauServico);
    }

    /**
     * @test
     */
    public function testReadGrauServico()
    {
        $grauServico = $this->makeGrauServico();
        $this->json('GET', '/api/v1/grauServicos/'.$grauServico->id);

        $this->assertApiResponse($grauServico->toArray());
    }

    /**
     * @test
     */
    public function testUpdateGrauServico()
    {
        $grauServico = $this->makeGrauServico();
        $editedGrauServico = $this->fakeGrauServicoData();

        $this->json('PUT', '/api/v1/grauServicos/'.$grauServico->id, $editedGrauServico);

        $this->assertApiResponse($editedGrauServico);
    }

    /**
     * @test
     */
    public function testDeleteGrauServico()
    {
        $grauServico = $this->makeGrauServico();
        $this->json('DELETE', '/api/v1/grauServicos/'.$grauServico->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/grauServicos/'.$grauServico->id);

        $this->assertResponseStatus(404);
    }
}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OpcaoCulinariaApiTest extends TestCase
{
    use MakeOpcaoCulinariaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateOpcaoCulinaria()
    {
        $opcaoCulinaria = $this->fakeOpcaoCulinariaData();
        $this->json('POST', '/api/v1/opcaoCulinarias', $opcaoCulinaria);

        $this->assertApiResponse($opcaoCulinaria);
    }

    /**
     * @test
     */
    public function testReadOpcaoCulinaria()
    {
        $opcaoCulinaria = $this->makeOpcaoCulinaria();
        $this->json('GET', '/api/v1/opcaoCulinarias/'.$opcaoCulinaria->id);

        $this->assertApiResponse($opcaoCulinaria->toArray());
    }

    /**
     * @test
     */
    public function testUpdateOpcaoCulinaria()
    {
        $opcaoCulinaria = $this->makeOpcaoCulinaria();
        $editedOpcaoCulinaria = $this->fakeOpcaoCulinariaData();

        $this->json('PUT', '/api/v1/opcaoCulinarias/'.$opcaoCulinaria->id, $editedOpcaoCulinaria);

        $this->assertApiResponse($editedOpcaoCulinaria);
    }

    /**
     * @test
     */
    public function testDeleteOpcaoCulinaria()
    {
        $opcaoCulinaria = $this->makeOpcaoCulinaria();
        $this->json('DELETE', '/api/v1/opcaoCulinarias/'.$opcaoCulinaria->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/opcaoCulinarias/'.$opcaoCulinaria->id);

        $this->assertResponseStatus(404);
    }
}

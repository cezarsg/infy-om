<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PalavrasChaveApiTest extends TestCase
{
    use MakePalavrasChaveTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePalavrasChave()
    {
        $palavrasChave = $this->fakePalavrasChaveData();
        $this->json('POST', '/api/v1/palavrasChaves', $palavrasChave);

        $this->assertApiResponse($palavrasChave);
    }

    /**
     * @test
     */
    public function testReadPalavrasChave()
    {
        $palavrasChave = $this->makePalavrasChave();
        $this->json('GET', '/api/v1/palavrasChaves/'.$palavrasChave->id);

        $this->assertApiResponse($palavrasChave->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePalavrasChave()
    {
        $palavrasChave = $this->makePalavrasChave();
        $editedPalavrasChave = $this->fakePalavrasChaveData();

        $this->json('PUT', '/api/v1/palavrasChaves/'.$palavrasChave->id, $editedPalavrasChave);

        $this->assertApiResponse($editedPalavrasChave);
    }

    /**
     * @test
     */
    public function testDeletePalavrasChave()
    {
        $palavrasChave = $this->makePalavrasChave();
        $this->json('DELETE', '/api/v1/palavrasChaves/'.$palavrasChave->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/palavrasChaves/'.$palavrasChave->id);

        $this->assertResponseStatus(404);
    }
}

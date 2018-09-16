<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PalavrasChaveNegativasApiTest extends TestCase
{
    use MakePalavrasChaveNegativasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePalavrasChaveNegativas()
    {
        $palavrasChaveNegativas = $this->fakePalavrasChaveNegativasData();
        $this->json('POST', '/api/v1/palavrasChaveNegativas', $palavrasChaveNegativas);

        $this->assertApiResponse($palavrasChaveNegativas);
    }

    /**
     * @test
     */
    public function testReadPalavrasChaveNegativas()
    {
        $palavrasChaveNegativas = $this->makePalavrasChaveNegativas();
        $this->json('GET', '/api/v1/palavrasChaveNegativas/'.$palavrasChaveNegativas->id);

        $this->assertApiResponse($palavrasChaveNegativas->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePalavrasChaveNegativas()
    {
        $palavrasChaveNegativas = $this->makePalavrasChaveNegativas();
        $editedPalavrasChaveNegativas = $this->fakePalavrasChaveNegativasData();

        $this->json('PUT', '/api/v1/palavrasChaveNegativas/'.$palavrasChaveNegativas->id, $editedPalavrasChaveNegativas);

        $this->assertApiResponse($editedPalavrasChaveNegativas);
    }

    /**
     * @test
     */
    public function testDeletePalavrasChaveNegativas()
    {
        $palavrasChaveNegativas = $this->makePalavrasChaveNegativas();
        $this->json('DELETE', '/api/v1/palavrasChaveNegativas/'.$palavrasChaveNegativas->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/palavrasChaveNegativas/'.$palavrasChaveNegativas->id);

        $this->assertResponseStatus(404);
    }
}

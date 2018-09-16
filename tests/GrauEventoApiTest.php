<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GrauEventoApiTest extends TestCase
{
    use MakeGrauEventoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateGrauEvento()
    {
        $grauEvento = $this->fakeGrauEventoData();
        $this->json('POST', '/api/v1/grauEventos', $grauEvento);

        $this->assertApiResponse($grauEvento);
    }

    /**
     * @test
     */
    public function testReadGrauEvento()
    {
        $grauEvento = $this->makeGrauEvento();
        $this->json('GET', '/api/v1/grauEventos/'.$grauEvento->id);

        $this->assertApiResponse($grauEvento->toArray());
    }

    /**
     * @test
     */
    public function testUpdateGrauEvento()
    {
        $grauEvento = $this->makeGrauEvento();
        $editedGrauEvento = $this->fakeGrauEventoData();

        $this->json('PUT', '/api/v1/grauEventos/'.$grauEvento->id, $editedGrauEvento);

        $this->assertApiResponse($editedGrauEvento);
    }

    /**
     * @test
     */
    public function testDeleteGrauEvento()
    {
        $grauEvento = $this->makeGrauEvento();
        $this->json('DELETE', '/api/v1/grauEventos/'.$grauEvento->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/grauEventos/'.$grauEvento->id);

        $this->assertResponseStatus(404);
    }
}

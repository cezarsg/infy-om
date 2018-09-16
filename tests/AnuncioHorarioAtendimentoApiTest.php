<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnuncioHorarioAtendimentoApiTest extends TestCase
{
    use MakeAnuncioHorarioAtendimentoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAnuncioHorarioAtendimento()
    {
        $anuncioHorarioAtendimento = $this->fakeAnuncioHorarioAtendimentoData();
        $this->json('POST', '/api/v1/anuncioHorarioAtendimentos', $anuncioHorarioAtendimento);

        $this->assertApiResponse($anuncioHorarioAtendimento);
    }

    /**
     * @test
     */
    public function testReadAnuncioHorarioAtendimento()
    {
        $anuncioHorarioAtendimento = $this->makeAnuncioHorarioAtendimento();
        $this->json('GET', '/api/v1/anuncioHorarioAtendimentos/'.$anuncioHorarioAtendimento->id);

        $this->assertApiResponse($anuncioHorarioAtendimento->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAnuncioHorarioAtendimento()
    {
        $anuncioHorarioAtendimento = $this->makeAnuncioHorarioAtendimento();
        $editedAnuncioHorarioAtendimento = $this->fakeAnuncioHorarioAtendimentoData();

        $this->json('PUT', '/api/v1/anuncioHorarioAtendimentos/'.$anuncioHorarioAtendimento->id, $editedAnuncioHorarioAtendimento);

        $this->assertApiResponse($editedAnuncioHorarioAtendimento);
    }

    /**
     * @test
     */
    public function testDeleteAnuncioHorarioAtendimento()
    {
        $anuncioHorarioAtendimento = $this->makeAnuncioHorarioAtendimento();
        $this->json('DELETE', '/api/v1/anuncioHorarioAtendimentos/'.$anuncioHorarioAtendimento->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/anuncioHorarioAtendimentos/'.$anuncioHorarioAtendimento->id);

        $this->assertResponseStatus(404);
    }
}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnuncioDiaPromocoesApiTest extends TestCase
{
    use MakeAnuncioDiaPromocoesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAnuncioDiaPromocoes()
    {
        $anuncioDiaPromocoes = $this->fakeAnuncioDiaPromocoesData();
        $this->json('POST', '/api/v1/anuncioDiaPromocoes', $anuncioDiaPromocoes);

        $this->assertApiResponse($anuncioDiaPromocoes);
    }

    /**
     * @test
     */
    public function testReadAnuncioDiaPromocoes()
    {
        $anuncioDiaPromocoes = $this->makeAnuncioDiaPromocoes();
        $this->json('GET', '/api/v1/anuncioDiaPromocoes/'.$anuncioDiaPromocoes->id);

        $this->assertApiResponse($anuncioDiaPromocoes->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAnuncioDiaPromocoes()
    {
        $anuncioDiaPromocoes = $this->makeAnuncioDiaPromocoes();
        $editedAnuncioDiaPromocoes = $this->fakeAnuncioDiaPromocoesData();

        $this->json('PUT', '/api/v1/anuncioDiaPromocoes/'.$anuncioDiaPromocoes->id, $editedAnuncioDiaPromocoes);

        $this->assertApiResponse($editedAnuncioDiaPromocoes);
    }

    /**
     * @test
     */
    public function testDeleteAnuncioDiaPromocoes()
    {
        $anuncioDiaPromocoes = $this->makeAnuncioDiaPromocoes();
        $this->json('DELETE', '/api/v1/anuncioDiaPromocoes/'.$anuncioDiaPromocoes->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/anuncioDiaPromocoes/'.$anuncioDiaPromocoes->id);

        $this->assertResponseStatus(404);
    }
}

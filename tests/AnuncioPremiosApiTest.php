<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnuncioPremiosApiTest extends TestCase
{
    use MakeAnuncioPremiosTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAnuncioPremios()
    {
        $anuncioPremios = $this->fakeAnuncioPremiosData();
        $this->json('POST', '/api/v1/anuncioPremios', $anuncioPremios);

        $this->assertApiResponse($anuncioPremios);
    }

    /**
     * @test
     */
    public function testReadAnuncioPremios()
    {
        $anuncioPremios = $this->makeAnuncioPremios();
        $this->json('GET', '/api/v1/anuncioPremios/'.$anuncioPremios->id);

        $this->assertApiResponse($anuncioPremios->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAnuncioPremios()
    {
        $anuncioPremios = $this->makeAnuncioPremios();
        $editedAnuncioPremios = $this->fakeAnuncioPremiosData();

        $this->json('PUT', '/api/v1/anuncioPremios/'.$anuncioPremios->id, $editedAnuncioPremios);

        $this->assertApiResponse($editedAnuncioPremios);
    }

    /**
     * @test
     */
    public function testDeleteAnuncioPremios()
    {
        $anuncioPremios = $this->makeAnuncioPremios();
        $this->json('DELETE', '/api/v1/anuncioPremios/'.$anuncioPremios->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/anuncioPremios/'.$anuncioPremios->id);

        $this->assertResponseStatus(404);
    }
}

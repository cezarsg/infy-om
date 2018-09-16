<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnuncioVideosApiTest extends TestCase
{
    use MakeAnuncioVideosTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAnuncioVideos()
    {
        $anuncioVideos = $this->fakeAnuncioVideosData();
        $this->json('POST', '/api/v1/anuncioVideos', $anuncioVideos);

        $this->assertApiResponse($anuncioVideos);
    }

    /**
     * @test
     */
    public function testReadAnuncioVideos()
    {
        $anuncioVideos = $this->makeAnuncioVideos();
        $this->json('GET', '/api/v1/anuncioVideos/'.$anuncioVideos->id);

        $this->assertApiResponse($anuncioVideos->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAnuncioVideos()
    {
        $anuncioVideos = $this->makeAnuncioVideos();
        $editedAnuncioVideos = $this->fakeAnuncioVideosData();

        $this->json('PUT', '/api/v1/anuncioVideos/'.$anuncioVideos->id, $editedAnuncioVideos);

        $this->assertApiResponse($editedAnuncioVideos);
    }

    /**
     * @test
     */
    public function testDeleteAnuncioVideos()
    {
        $anuncioVideos = $this->makeAnuncioVideos();
        $this->json('DELETE', '/api/v1/anuncioVideos/'.$anuncioVideos->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/anuncioVideos/'.$anuncioVideos->id);

        $this->assertResponseStatus(404);
    }
}

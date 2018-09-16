<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PaginaEventoVideoApiTest extends TestCase
{
    use MakePaginaEventoVideoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePaginaEventoVideo()
    {
        $paginaEventoVideo = $this->fakePaginaEventoVideoData();
        $this->json('POST', '/api/v1/paginaEventoVideos', $paginaEventoVideo);

        $this->assertApiResponse($paginaEventoVideo);
    }

    /**
     * @test
     */
    public function testReadPaginaEventoVideo()
    {
        $paginaEventoVideo = $this->makePaginaEventoVideo();
        $this->json('GET', '/api/v1/paginaEventoVideos/'.$paginaEventoVideo->id);

        $this->assertApiResponse($paginaEventoVideo->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePaginaEventoVideo()
    {
        $paginaEventoVideo = $this->makePaginaEventoVideo();
        $editedPaginaEventoVideo = $this->fakePaginaEventoVideoData();

        $this->json('PUT', '/api/v1/paginaEventoVideos/'.$paginaEventoVideo->id, $editedPaginaEventoVideo);

        $this->assertApiResponse($editedPaginaEventoVideo);
    }

    /**
     * @test
     */
    public function testDeletePaginaEventoVideo()
    {
        $paginaEventoVideo = $this->makePaginaEventoVideo();
        $this->json('DELETE', '/api/v1/paginaEventoVideos/'.$paginaEventoVideo->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/paginaEventoVideos/'.$paginaEventoVideo->id);

        $this->assertResponseStatus(404);
    }
}

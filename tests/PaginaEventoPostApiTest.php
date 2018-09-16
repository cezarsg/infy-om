<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PaginaEventoPostApiTest extends TestCase
{
    use MakePaginaEventoPostTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePaginaEventoPost()
    {
        $paginaEventoPost = $this->fakePaginaEventoPostData();
        $this->json('POST', '/api/v1/paginaEventoPosts', $paginaEventoPost);

        $this->assertApiResponse($paginaEventoPost);
    }

    /**
     * @test
     */
    public function testReadPaginaEventoPost()
    {
        $paginaEventoPost = $this->makePaginaEventoPost();
        $this->json('GET', '/api/v1/paginaEventoPosts/'.$paginaEventoPost->id);

        $this->assertApiResponse($paginaEventoPost->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePaginaEventoPost()
    {
        $paginaEventoPost = $this->makePaginaEventoPost();
        $editedPaginaEventoPost = $this->fakePaginaEventoPostData();

        $this->json('PUT', '/api/v1/paginaEventoPosts/'.$paginaEventoPost->id, $editedPaginaEventoPost);

        $this->assertApiResponse($editedPaginaEventoPost);
    }

    /**
     * @test
     */
    public function testDeletePaginaEventoPost()
    {
        $paginaEventoPost = $this->makePaginaEventoPost();
        $this->json('DELETE', '/api/v1/paginaEventoPosts/'.$paginaEventoPost->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/paginaEventoPosts/'.$paginaEventoPost->id);

        $this->assertResponseStatus(404);
    }
}

<?php

use App\Models\PaginaEventoVideo;
use App\Repositories\PaginaEventoVideoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PaginaEventoVideoRepositoryTest extends TestCase
{
    use MakePaginaEventoVideoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PaginaEventoVideoRepository
     */
    protected $paginaEventoVideoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->paginaEventoVideoRepo = App::make(PaginaEventoVideoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePaginaEventoVideo()
    {
        $paginaEventoVideo = $this->fakePaginaEventoVideoData();
        $createdPaginaEventoVideo = $this->paginaEventoVideoRepo->create($paginaEventoVideo);
        $createdPaginaEventoVideo = $createdPaginaEventoVideo->toArray();
        $this->assertArrayHasKey('id', $createdPaginaEventoVideo);
        $this->assertNotNull($createdPaginaEventoVideo['id'], 'Created PaginaEventoVideo must have id specified');
        $this->assertNotNull(PaginaEventoVideo::find($createdPaginaEventoVideo['id']), 'PaginaEventoVideo with given id must be in DB');
        $this->assertModelData($paginaEventoVideo, $createdPaginaEventoVideo);
    }

    /**
     * @test read
     */
    public function testReadPaginaEventoVideo()
    {
        $paginaEventoVideo = $this->makePaginaEventoVideo();
        $dbPaginaEventoVideo = $this->paginaEventoVideoRepo->find($paginaEventoVideo->id);
        $dbPaginaEventoVideo = $dbPaginaEventoVideo->toArray();
        $this->assertModelData($paginaEventoVideo->toArray(), $dbPaginaEventoVideo);
    }

    /**
     * @test update
     */
    public function testUpdatePaginaEventoVideo()
    {
        $paginaEventoVideo = $this->makePaginaEventoVideo();
        $fakePaginaEventoVideo = $this->fakePaginaEventoVideoData();
        $updatedPaginaEventoVideo = $this->paginaEventoVideoRepo->update($fakePaginaEventoVideo, $paginaEventoVideo->id);
        $this->assertModelData($fakePaginaEventoVideo, $updatedPaginaEventoVideo->toArray());
        $dbPaginaEventoVideo = $this->paginaEventoVideoRepo->find($paginaEventoVideo->id);
        $this->assertModelData($fakePaginaEventoVideo, $dbPaginaEventoVideo->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePaginaEventoVideo()
    {
        $paginaEventoVideo = $this->makePaginaEventoVideo();
        $resp = $this->paginaEventoVideoRepo->delete($paginaEventoVideo->id);
        $this->assertTrue($resp);
        $this->assertNull(PaginaEventoVideo::find($paginaEventoVideo->id), 'PaginaEventoVideo should not exist in DB');
    }
}

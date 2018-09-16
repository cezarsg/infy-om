<?php

use App\Models\PaginaEventoPost;
use App\Repositories\PaginaEventoPostRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PaginaEventoPostRepositoryTest extends TestCase
{
    use MakePaginaEventoPostTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PaginaEventoPostRepository
     */
    protected $paginaEventoPostRepo;

    public function setUp()
    {
        parent::setUp();
        $this->paginaEventoPostRepo = App::make(PaginaEventoPostRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePaginaEventoPost()
    {
        $paginaEventoPost = $this->fakePaginaEventoPostData();
        $createdPaginaEventoPost = $this->paginaEventoPostRepo->create($paginaEventoPost);
        $createdPaginaEventoPost = $createdPaginaEventoPost->toArray();
        $this->assertArrayHasKey('id', $createdPaginaEventoPost);
        $this->assertNotNull($createdPaginaEventoPost['id'], 'Created PaginaEventoPost must have id specified');
        $this->assertNotNull(PaginaEventoPost::find($createdPaginaEventoPost['id']), 'PaginaEventoPost with given id must be in DB');
        $this->assertModelData($paginaEventoPost, $createdPaginaEventoPost);
    }

    /**
     * @test read
     */
    public function testReadPaginaEventoPost()
    {
        $paginaEventoPost = $this->makePaginaEventoPost();
        $dbPaginaEventoPost = $this->paginaEventoPostRepo->find($paginaEventoPost->id);
        $dbPaginaEventoPost = $dbPaginaEventoPost->toArray();
        $this->assertModelData($paginaEventoPost->toArray(), $dbPaginaEventoPost);
    }

    /**
     * @test update
     */
    public function testUpdatePaginaEventoPost()
    {
        $paginaEventoPost = $this->makePaginaEventoPost();
        $fakePaginaEventoPost = $this->fakePaginaEventoPostData();
        $updatedPaginaEventoPost = $this->paginaEventoPostRepo->update($fakePaginaEventoPost, $paginaEventoPost->id);
        $this->assertModelData($fakePaginaEventoPost, $updatedPaginaEventoPost->toArray());
        $dbPaginaEventoPost = $this->paginaEventoPostRepo->find($paginaEventoPost->id);
        $this->assertModelData($fakePaginaEventoPost, $dbPaginaEventoPost->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePaginaEventoPost()
    {
        $paginaEventoPost = $this->makePaginaEventoPost();
        $resp = $this->paginaEventoPostRepo->delete($paginaEventoPost->id);
        $this->assertTrue($resp);
        $this->assertNull(PaginaEventoPost::find($paginaEventoPost->id), 'PaginaEventoPost should not exist in DB');
    }
}

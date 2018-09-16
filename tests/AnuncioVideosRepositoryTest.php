<?php

use App\Models\AnuncioVideos;
use App\Repositories\AnuncioVideosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnuncioVideosRepositoryTest extends TestCase
{
    use MakeAnuncioVideosTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AnuncioVideosRepository
     */
    protected $anuncioVideosRepo;

    public function setUp()
    {
        parent::setUp();
        $this->anuncioVideosRepo = App::make(AnuncioVideosRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAnuncioVideos()
    {
        $anuncioVideos = $this->fakeAnuncioVideosData();
        $createdAnuncioVideos = $this->anuncioVideosRepo->create($anuncioVideos);
        $createdAnuncioVideos = $createdAnuncioVideos->toArray();
        $this->assertArrayHasKey('id', $createdAnuncioVideos);
        $this->assertNotNull($createdAnuncioVideos['id'], 'Created AnuncioVideos must have id specified');
        $this->assertNotNull(AnuncioVideos::find($createdAnuncioVideos['id']), 'AnuncioVideos with given id must be in DB');
        $this->assertModelData($anuncioVideos, $createdAnuncioVideos);
    }

    /**
     * @test read
     */
    public function testReadAnuncioVideos()
    {
        $anuncioVideos = $this->makeAnuncioVideos();
        $dbAnuncioVideos = $this->anuncioVideosRepo->find($anuncioVideos->id);
        $dbAnuncioVideos = $dbAnuncioVideos->toArray();
        $this->assertModelData($anuncioVideos->toArray(), $dbAnuncioVideos);
    }

    /**
     * @test update
     */
    public function testUpdateAnuncioVideos()
    {
        $anuncioVideos = $this->makeAnuncioVideos();
        $fakeAnuncioVideos = $this->fakeAnuncioVideosData();
        $updatedAnuncioVideos = $this->anuncioVideosRepo->update($fakeAnuncioVideos, $anuncioVideos->id);
        $this->assertModelData($fakeAnuncioVideos, $updatedAnuncioVideos->toArray());
        $dbAnuncioVideos = $this->anuncioVideosRepo->find($anuncioVideos->id);
        $this->assertModelData($fakeAnuncioVideos, $dbAnuncioVideos->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAnuncioVideos()
    {
        $anuncioVideos = $this->makeAnuncioVideos();
        $resp = $this->anuncioVideosRepo->delete($anuncioVideos->id);
        $this->assertTrue($resp);
        $this->assertNull(AnuncioVideos::find($anuncioVideos->id), 'AnuncioVideos should not exist in DB');
    }
}

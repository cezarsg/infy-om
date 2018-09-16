<?php

use App\Models\AnuncioPremios;
use App\Repositories\AnuncioPremiosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnuncioPremiosRepositoryTest extends TestCase
{
    use MakeAnuncioPremiosTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AnuncioPremiosRepository
     */
    protected $anuncioPremiosRepo;

    public function setUp()
    {
        parent::setUp();
        $this->anuncioPremiosRepo = App::make(AnuncioPremiosRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAnuncioPremios()
    {
        $anuncioPremios = $this->fakeAnuncioPremiosData();
        $createdAnuncioPremios = $this->anuncioPremiosRepo->create($anuncioPremios);
        $createdAnuncioPremios = $createdAnuncioPremios->toArray();
        $this->assertArrayHasKey('id', $createdAnuncioPremios);
        $this->assertNotNull($createdAnuncioPremios['id'], 'Created AnuncioPremios must have id specified');
        $this->assertNotNull(AnuncioPremios::find($createdAnuncioPremios['id']), 'AnuncioPremios with given id must be in DB');
        $this->assertModelData($anuncioPremios, $createdAnuncioPremios);
    }

    /**
     * @test read
     */
    public function testReadAnuncioPremios()
    {
        $anuncioPremios = $this->makeAnuncioPremios();
        $dbAnuncioPremios = $this->anuncioPremiosRepo->find($anuncioPremios->id);
        $dbAnuncioPremios = $dbAnuncioPremios->toArray();
        $this->assertModelData($anuncioPremios->toArray(), $dbAnuncioPremios);
    }

    /**
     * @test update
     */
    public function testUpdateAnuncioPremios()
    {
        $anuncioPremios = $this->makeAnuncioPremios();
        $fakeAnuncioPremios = $this->fakeAnuncioPremiosData();
        $updatedAnuncioPremios = $this->anuncioPremiosRepo->update($fakeAnuncioPremios, $anuncioPremios->id);
        $this->assertModelData($fakeAnuncioPremios, $updatedAnuncioPremios->toArray());
        $dbAnuncioPremios = $this->anuncioPremiosRepo->find($anuncioPremios->id);
        $this->assertModelData($fakeAnuncioPremios, $dbAnuncioPremios->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAnuncioPremios()
    {
        $anuncioPremios = $this->makeAnuncioPremios();
        $resp = $this->anuncioPremiosRepo->delete($anuncioPremios->id);
        $this->assertTrue($resp);
        $this->assertNull(AnuncioPremios::find($anuncioPremios->id), 'AnuncioPremios should not exist in DB');
    }
}

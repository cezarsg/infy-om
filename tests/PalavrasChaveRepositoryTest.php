<?php

use App\Models\PalavrasChave;
use App\Repositories\PalavrasChaveRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PalavrasChaveRepositoryTest extends TestCase
{
    use MakePalavrasChaveTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PalavrasChaveRepository
     */
    protected $palavrasChaveRepo;

    public function setUp()
    {
        parent::setUp();
        $this->palavrasChaveRepo = App::make(PalavrasChaveRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePalavrasChave()
    {
        $palavrasChave = $this->fakePalavrasChaveData();
        $createdPalavrasChave = $this->palavrasChaveRepo->create($palavrasChave);
        $createdPalavrasChave = $createdPalavrasChave->toArray();
        $this->assertArrayHasKey('id', $createdPalavrasChave);
        $this->assertNotNull($createdPalavrasChave['id'], 'Created PalavrasChave must have id specified');
        $this->assertNotNull(PalavrasChave::find($createdPalavrasChave['id']), 'PalavrasChave with given id must be in DB');
        $this->assertModelData($palavrasChave, $createdPalavrasChave);
    }

    /**
     * @test read
     */
    public function testReadPalavrasChave()
    {
        $palavrasChave = $this->makePalavrasChave();
        $dbPalavrasChave = $this->palavrasChaveRepo->find($palavrasChave->id);
        $dbPalavrasChave = $dbPalavrasChave->toArray();
        $this->assertModelData($palavrasChave->toArray(), $dbPalavrasChave);
    }

    /**
     * @test update
     */
    public function testUpdatePalavrasChave()
    {
        $palavrasChave = $this->makePalavrasChave();
        $fakePalavrasChave = $this->fakePalavrasChaveData();
        $updatedPalavrasChave = $this->palavrasChaveRepo->update($fakePalavrasChave, $palavrasChave->id);
        $this->assertModelData($fakePalavrasChave, $updatedPalavrasChave->toArray());
        $dbPalavrasChave = $this->palavrasChaveRepo->find($palavrasChave->id);
        $this->assertModelData($fakePalavrasChave, $dbPalavrasChave->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePalavrasChave()
    {
        $palavrasChave = $this->makePalavrasChave();
        $resp = $this->palavrasChaveRepo->delete($palavrasChave->id);
        $this->assertTrue($resp);
        $this->assertNull(PalavrasChave::find($palavrasChave->id), 'PalavrasChave should not exist in DB');
    }
}

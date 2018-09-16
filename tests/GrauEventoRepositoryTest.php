<?php

use App\Models\GrauEvento;
use App\Repositories\GrauEventoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GrauEventoRepositoryTest extends TestCase
{
    use MakeGrauEventoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var GrauEventoRepository
     */
    protected $grauEventoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->grauEventoRepo = App::make(GrauEventoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateGrauEvento()
    {
        $grauEvento = $this->fakeGrauEventoData();
        $createdGrauEvento = $this->grauEventoRepo->create($grauEvento);
        $createdGrauEvento = $createdGrauEvento->toArray();
        $this->assertArrayHasKey('id', $createdGrauEvento);
        $this->assertNotNull($createdGrauEvento['id'], 'Created GrauEvento must have id specified');
        $this->assertNotNull(GrauEvento::find($createdGrauEvento['id']), 'GrauEvento with given id must be in DB');
        $this->assertModelData($grauEvento, $createdGrauEvento);
    }

    /**
     * @test read
     */
    public function testReadGrauEvento()
    {
        $grauEvento = $this->makeGrauEvento();
        $dbGrauEvento = $this->grauEventoRepo->find($grauEvento->id);
        $dbGrauEvento = $dbGrauEvento->toArray();
        $this->assertModelData($grauEvento->toArray(), $dbGrauEvento);
    }

    /**
     * @test update
     */
    public function testUpdateGrauEvento()
    {
        $grauEvento = $this->makeGrauEvento();
        $fakeGrauEvento = $this->fakeGrauEventoData();
        $updatedGrauEvento = $this->grauEventoRepo->update($fakeGrauEvento, $grauEvento->id);
        $this->assertModelData($fakeGrauEvento, $updatedGrauEvento->toArray());
        $dbGrauEvento = $this->grauEventoRepo->find($grauEvento->id);
        $this->assertModelData($fakeGrauEvento, $dbGrauEvento->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteGrauEvento()
    {
        $grauEvento = $this->makeGrauEvento();
        $resp = $this->grauEventoRepo->delete($grauEvento->id);
        $this->assertTrue($resp);
        $this->assertNull(GrauEvento::find($grauEvento->id), 'GrauEvento should not exist in DB');
    }
}

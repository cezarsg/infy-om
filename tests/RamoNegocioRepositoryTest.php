<?php

use App\Models\RamoNegocio;
use App\Repositories\RamoNegocioRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RamoNegocioRepositoryTest extends TestCase
{
    use MakeRamoNegocioTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RamoNegocioRepository
     */
    protected $ramoNegocioRepo;

    public function setUp()
    {
        parent::setUp();
        $this->ramoNegocioRepo = App::make(RamoNegocioRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRamoNegocio()
    {
        $ramoNegocio = $this->fakeRamoNegocioData();
        $createdRamoNegocio = $this->ramoNegocioRepo->create($ramoNegocio);
        $createdRamoNegocio = $createdRamoNegocio->toArray();
        $this->assertArrayHasKey('id', $createdRamoNegocio);
        $this->assertNotNull($createdRamoNegocio['id'], 'Created RamoNegocio must have id specified');
        $this->assertNotNull(RamoNegocio::find($createdRamoNegocio['id']), 'RamoNegocio with given id must be in DB');
        $this->assertModelData($ramoNegocio, $createdRamoNegocio);
    }

    /**
     * @test read
     */
    public function testReadRamoNegocio()
    {
        $ramoNegocio = $this->makeRamoNegocio();
        $dbRamoNegocio = $this->ramoNegocioRepo->find($ramoNegocio->id);
        $dbRamoNegocio = $dbRamoNegocio->toArray();
        $this->assertModelData($ramoNegocio->toArray(), $dbRamoNegocio);
    }

    /**
     * @test update
     */
    public function testUpdateRamoNegocio()
    {
        $ramoNegocio = $this->makeRamoNegocio();
        $fakeRamoNegocio = $this->fakeRamoNegocioData();
        $updatedRamoNegocio = $this->ramoNegocioRepo->update($fakeRamoNegocio, $ramoNegocio->id);
        $this->assertModelData($fakeRamoNegocio, $updatedRamoNegocio->toArray());
        $dbRamoNegocio = $this->ramoNegocioRepo->find($ramoNegocio->id);
        $this->assertModelData($fakeRamoNegocio, $dbRamoNegocio->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRamoNegocio()
    {
        $ramoNegocio = $this->makeRamoNegocio();
        $resp = $this->ramoNegocioRepo->delete($ramoNegocio->id);
        $this->assertTrue($resp);
        $this->assertNull(RamoNegocio::find($ramoNegocio->id), 'RamoNegocio should not exist in DB');
    }
}

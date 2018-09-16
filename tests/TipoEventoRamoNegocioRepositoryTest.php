<?php

use App\Models\TipoEventoRamoNegocio;
use App\Repositories\TipoEventoRamoNegocioRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TipoEventoRamoNegocioRepositoryTest extends TestCase
{
    use MakeTipoEventoRamoNegocioTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TipoEventoRamoNegocioRepository
     */
    protected $tipoEventoRamoNegocioRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tipoEventoRamoNegocioRepo = App::make(TipoEventoRamoNegocioRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTipoEventoRamoNegocio()
    {
        $tipoEventoRamoNegocio = $this->fakeTipoEventoRamoNegocioData();
        $createdTipoEventoRamoNegocio = $this->tipoEventoRamoNegocioRepo->create($tipoEventoRamoNegocio);
        $createdTipoEventoRamoNegocio = $createdTipoEventoRamoNegocio->toArray();
        $this->assertArrayHasKey('id', $createdTipoEventoRamoNegocio);
        $this->assertNotNull($createdTipoEventoRamoNegocio['id'], 'Created TipoEventoRamoNegocio must have id specified');
        $this->assertNotNull(TipoEventoRamoNegocio::find($createdTipoEventoRamoNegocio['id']), 'TipoEventoRamoNegocio with given id must be in DB');
        $this->assertModelData($tipoEventoRamoNegocio, $createdTipoEventoRamoNegocio);
    }

    /**
     * @test read
     */
    public function testReadTipoEventoRamoNegocio()
    {
        $tipoEventoRamoNegocio = $this->makeTipoEventoRamoNegocio();
        $dbTipoEventoRamoNegocio = $this->tipoEventoRamoNegocioRepo->find($tipoEventoRamoNegocio->id);
        $dbTipoEventoRamoNegocio = $dbTipoEventoRamoNegocio->toArray();
        $this->assertModelData($tipoEventoRamoNegocio->toArray(), $dbTipoEventoRamoNegocio);
    }

    /**
     * @test update
     */
    public function testUpdateTipoEventoRamoNegocio()
    {
        $tipoEventoRamoNegocio = $this->makeTipoEventoRamoNegocio();
        $fakeTipoEventoRamoNegocio = $this->fakeTipoEventoRamoNegocioData();
        $updatedTipoEventoRamoNegocio = $this->tipoEventoRamoNegocioRepo->update($fakeTipoEventoRamoNegocio, $tipoEventoRamoNegocio->id);
        $this->assertModelData($fakeTipoEventoRamoNegocio, $updatedTipoEventoRamoNegocio->toArray());
        $dbTipoEventoRamoNegocio = $this->tipoEventoRamoNegocioRepo->find($tipoEventoRamoNegocio->id);
        $this->assertModelData($fakeTipoEventoRamoNegocio, $dbTipoEventoRamoNegocio->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTipoEventoRamoNegocio()
    {
        $tipoEventoRamoNegocio = $this->makeTipoEventoRamoNegocio();
        $resp = $this->tipoEventoRamoNegocioRepo->delete($tipoEventoRamoNegocio->id);
        $this->assertTrue($resp);
        $this->assertNull(TipoEventoRamoNegocio::find($tipoEventoRamoNegocio->id), 'TipoEventoRamoNegocio should not exist in DB');
    }
}

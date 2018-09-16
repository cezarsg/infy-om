<?php

use App\Models\TipoEvento;
use App\Repositories\TipoEventoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TipoEventoRepositoryTest extends TestCase
{
    use MakeTipoEventoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TipoEventoRepository
     */
    protected $tipoEventoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tipoEventoRepo = App::make(TipoEventoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTipoEvento()
    {
        $tipoEvento = $this->fakeTipoEventoData();
        $createdTipoEvento = $this->tipoEventoRepo->create($tipoEvento);
        $createdTipoEvento = $createdTipoEvento->toArray();
        $this->assertArrayHasKey('id', $createdTipoEvento);
        $this->assertNotNull($createdTipoEvento['id'], 'Created TipoEvento must have id specified');
        $this->assertNotNull(TipoEvento::find($createdTipoEvento['id']), 'TipoEvento with given id must be in DB');
        $this->assertModelData($tipoEvento, $createdTipoEvento);
    }

    /**
     * @test read
     */
    public function testReadTipoEvento()
    {
        $tipoEvento = $this->makeTipoEvento();
        $dbTipoEvento = $this->tipoEventoRepo->find($tipoEvento->id);
        $dbTipoEvento = $dbTipoEvento->toArray();
        $this->assertModelData($tipoEvento->toArray(), $dbTipoEvento);
    }

    /**
     * @test update
     */
    public function testUpdateTipoEvento()
    {
        $tipoEvento = $this->makeTipoEvento();
        $fakeTipoEvento = $this->fakeTipoEventoData();
        $updatedTipoEvento = $this->tipoEventoRepo->update($fakeTipoEvento, $tipoEvento->id);
        $this->assertModelData($fakeTipoEvento, $updatedTipoEvento->toArray());
        $dbTipoEvento = $this->tipoEventoRepo->find($tipoEvento->id);
        $this->assertModelData($fakeTipoEvento, $dbTipoEvento->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTipoEvento()
    {
        $tipoEvento = $this->makeTipoEvento();
        $resp = $this->tipoEventoRepo->delete($tipoEvento->id);
        $this->assertTrue($resp);
        $this->assertNull(TipoEvento::find($tipoEvento->id), 'TipoEvento should not exist in DB');
    }
}

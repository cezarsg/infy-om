<?php

use App\Models\ConsumidorHistorico;
use App\Repositories\ConsumidorHistoricoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConsumidorHistoricoRepositoryTest extends TestCase
{
    use MakeConsumidorHistoricoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ConsumidorHistoricoRepository
     */
    protected $consumidorHistoricoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->consumidorHistoricoRepo = App::make(ConsumidorHistoricoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateConsumidorHistorico()
    {
        $consumidorHistorico = $this->fakeConsumidorHistoricoData();
        $createdConsumidorHistorico = $this->consumidorHistoricoRepo->create($consumidorHistorico);
        $createdConsumidorHistorico = $createdConsumidorHistorico->toArray();
        $this->assertArrayHasKey('id', $createdConsumidorHistorico);
        $this->assertNotNull($createdConsumidorHistorico['id'], 'Created ConsumidorHistorico must have id specified');
        $this->assertNotNull(ConsumidorHistorico::find($createdConsumidorHistorico['id']), 'ConsumidorHistorico with given id must be in DB');
        $this->assertModelData($consumidorHistorico, $createdConsumidorHistorico);
    }

    /**
     * @test read
     */
    public function testReadConsumidorHistorico()
    {
        $consumidorHistorico = $this->makeConsumidorHistorico();
        $dbConsumidorHistorico = $this->consumidorHistoricoRepo->find($consumidorHistorico->id);
        $dbConsumidorHistorico = $dbConsumidorHistorico->toArray();
        $this->assertModelData($consumidorHistorico->toArray(), $dbConsumidorHistorico);
    }

    /**
     * @test update
     */
    public function testUpdateConsumidorHistorico()
    {
        $consumidorHistorico = $this->makeConsumidorHistorico();
        $fakeConsumidorHistorico = $this->fakeConsumidorHistoricoData();
        $updatedConsumidorHistorico = $this->consumidorHistoricoRepo->update($fakeConsumidorHistorico, $consumidorHistorico->id);
        $this->assertModelData($fakeConsumidorHistorico, $updatedConsumidorHistorico->toArray());
        $dbConsumidorHistorico = $this->consumidorHistoricoRepo->find($consumidorHistorico->id);
        $this->assertModelData($fakeConsumidorHistorico, $dbConsumidorHistorico->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteConsumidorHistorico()
    {
        $consumidorHistorico = $this->makeConsumidorHistorico();
        $resp = $this->consumidorHistoricoRepo->delete($consumidorHistorico->id);
        $this->assertTrue($resp);
        $this->assertNull(ConsumidorHistorico::find($consumidorHistorico->id), 'ConsumidorHistorico should not exist in DB');
    }
}

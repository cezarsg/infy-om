<?php

use App\Models\ConsumidorOpcaoCulinaria;
use App\Repositories\ConsumidorOpcaoCulinariaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConsumidorOpcaoCulinariaRepositoryTest extends TestCase
{
    use MakeConsumidorOpcaoCulinariaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ConsumidorOpcaoCulinariaRepository
     */
    protected $consumidorOpcaoCulinariaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->consumidorOpcaoCulinariaRepo = App::make(ConsumidorOpcaoCulinariaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateConsumidorOpcaoCulinaria()
    {
        $consumidorOpcaoCulinaria = $this->fakeConsumidorOpcaoCulinariaData();
        $createdConsumidorOpcaoCulinaria = $this->consumidorOpcaoCulinariaRepo->create($consumidorOpcaoCulinaria);
        $createdConsumidorOpcaoCulinaria = $createdConsumidorOpcaoCulinaria->toArray();
        $this->assertArrayHasKey('id', $createdConsumidorOpcaoCulinaria);
        $this->assertNotNull($createdConsumidorOpcaoCulinaria['id'], 'Created ConsumidorOpcaoCulinaria must have id specified');
        $this->assertNotNull(ConsumidorOpcaoCulinaria::find($createdConsumidorOpcaoCulinaria['id']), 'ConsumidorOpcaoCulinaria with given id must be in DB');
        $this->assertModelData($consumidorOpcaoCulinaria, $createdConsumidorOpcaoCulinaria);
    }

    /**
     * @test read
     */
    public function testReadConsumidorOpcaoCulinaria()
    {
        $consumidorOpcaoCulinaria = $this->makeConsumidorOpcaoCulinaria();
        $dbConsumidorOpcaoCulinaria = $this->consumidorOpcaoCulinariaRepo->find($consumidorOpcaoCulinaria->id);
        $dbConsumidorOpcaoCulinaria = $dbConsumidorOpcaoCulinaria->toArray();
        $this->assertModelData($consumidorOpcaoCulinaria->toArray(), $dbConsumidorOpcaoCulinaria);
    }

    /**
     * @test update
     */
    public function testUpdateConsumidorOpcaoCulinaria()
    {
        $consumidorOpcaoCulinaria = $this->makeConsumidorOpcaoCulinaria();
        $fakeConsumidorOpcaoCulinaria = $this->fakeConsumidorOpcaoCulinariaData();
        $updatedConsumidorOpcaoCulinaria = $this->consumidorOpcaoCulinariaRepo->update($fakeConsumidorOpcaoCulinaria, $consumidorOpcaoCulinaria->id);
        $this->assertModelData($fakeConsumidorOpcaoCulinaria, $updatedConsumidorOpcaoCulinaria->toArray());
        $dbConsumidorOpcaoCulinaria = $this->consumidorOpcaoCulinariaRepo->find($consumidorOpcaoCulinaria->id);
        $this->assertModelData($fakeConsumidorOpcaoCulinaria, $dbConsumidorOpcaoCulinaria->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteConsumidorOpcaoCulinaria()
    {
        $consumidorOpcaoCulinaria = $this->makeConsumidorOpcaoCulinaria();
        $resp = $this->consumidorOpcaoCulinariaRepo->delete($consumidorOpcaoCulinaria->id);
        $this->assertTrue($resp);
        $this->assertNull(ConsumidorOpcaoCulinaria::find($consumidorOpcaoCulinaria->id), 'ConsumidorOpcaoCulinaria should not exist in DB');
    }
}

<?php

use App\Models\ConsumidorPalavraChave;
use App\Repositories\ConsumidorPalavraChaveRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConsumidorPalavraChaveRepositoryTest extends TestCase
{
    use MakeConsumidorPalavraChaveTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ConsumidorPalavraChaveRepository
     */
    protected $consumidorPalavraChaveRepo;

    public function setUp()
    {
        parent::setUp();
        $this->consumidorPalavraChaveRepo = App::make(ConsumidorPalavraChaveRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateConsumidorPalavraChave()
    {
        $consumidorPalavraChave = $this->fakeConsumidorPalavraChaveData();
        $createdConsumidorPalavraChave = $this->consumidorPalavraChaveRepo->create($consumidorPalavraChave);
        $createdConsumidorPalavraChave = $createdConsumidorPalavraChave->toArray();
        $this->assertArrayHasKey('id', $createdConsumidorPalavraChave);
        $this->assertNotNull($createdConsumidorPalavraChave['id'], 'Created ConsumidorPalavraChave must have id specified');
        $this->assertNotNull(ConsumidorPalavraChave::find($createdConsumidorPalavraChave['id']), 'ConsumidorPalavraChave with given id must be in DB');
        $this->assertModelData($consumidorPalavraChave, $createdConsumidorPalavraChave);
    }

    /**
     * @test read
     */
    public function testReadConsumidorPalavraChave()
    {
        $consumidorPalavraChave = $this->makeConsumidorPalavraChave();
        $dbConsumidorPalavraChave = $this->consumidorPalavraChaveRepo->find($consumidorPalavraChave->id);
        $dbConsumidorPalavraChave = $dbConsumidorPalavraChave->toArray();
        $this->assertModelData($consumidorPalavraChave->toArray(), $dbConsumidorPalavraChave);
    }

    /**
     * @test update
     */
    public function testUpdateConsumidorPalavraChave()
    {
        $consumidorPalavraChave = $this->makeConsumidorPalavraChave();
        $fakeConsumidorPalavraChave = $this->fakeConsumidorPalavraChaveData();
        $updatedConsumidorPalavraChave = $this->consumidorPalavraChaveRepo->update($fakeConsumidorPalavraChave, $consumidorPalavraChave->id);
        $this->assertModelData($fakeConsumidorPalavraChave, $updatedConsumidorPalavraChave->toArray());
        $dbConsumidorPalavraChave = $this->consumidorPalavraChaveRepo->find($consumidorPalavraChave->id);
        $this->assertModelData($fakeConsumidorPalavraChave, $dbConsumidorPalavraChave->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteConsumidorPalavraChave()
    {
        $consumidorPalavraChave = $this->makeConsumidorPalavraChave();
        $resp = $this->consumidorPalavraChaveRepo->delete($consumidorPalavraChave->id);
        $this->assertTrue($resp);
        $this->assertNull(ConsumidorPalavraChave::find($consumidorPalavraChave->id), 'ConsumidorPalavraChave should not exist in DB');
    }
}

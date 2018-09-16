<?php

use App\Models\StatusConsumidor;
use App\Repositories\StatusConsumidorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatusConsumidorRepositoryTest extends TestCase
{
    use MakeStatusConsumidorTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var StatusConsumidorRepository
     */
    protected $statusConsumidorRepo;

    public function setUp()
    {
        parent::setUp();
        $this->statusConsumidorRepo = App::make(StatusConsumidorRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateStatusConsumidor()
    {
        $statusConsumidor = $this->fakeStatusConsumidorData();
        $createdStatusConsumidor = $this->statusConsumidorRepo->create($statusConsumidor);
        $createdStatusConsumidor = $createdStatusConsumidor->toArray();
        $this->assertArrayHasKey('id', $createdStatusConsumidor);
        $this->assertNotNull($createdStatusConsumidor['id'], 'Created StatusConsumidor must have id specified');
        $this->assertNotNull(StatusConsumidor::find($createdStatusConsumidor['id']), 'StatusConsumidor with given id must be in DB');
        $this->assertModelData($statusConsumidor, $createdStatusConsumidor);
    }

    /**
     * @test read
     */
    public function testReadStatusConsumidor()
    {
        $statusConsumidor = $this->makeStatusConsumidor();
        $dbStatusConsumidor = $this->statusConsumidorRepo->find($statusConsumidor->id);
        $dbStatusConsumidor = $dbStatusConsumidor->toArray();
        $this->assertModelData($statusConsumidor->toArray(), $dbStatusConsumidor);
    }

    /**
     * @test update
     */
    public function testUpdateStatusConsumidor()
    {
        $statusConsumidor = $this->makeStatusConsumidor();
        $fakeStatusConsumidor = $this->fakeStatusConsumidorData();
        $updatedStatusConsumidor = $this->statusConsumidorRepo->update($fakeStatusConsumidor, $statusConsumidor->id);
        $this->assertModelData($fakeStatusConsumidor, $updatedStatusConsumidor->toArray());
        $dbStatusConsumidor = $this->statusConsumidorRepo->find($statusConsumidor->id);
        $this->assertModelData($fakeStatusConsumidor, $dbStatusConsumidor->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteStatusConsumidor()
    {
        $statusConsumidor = $this->makeStatusConsumidor();
        $resp = $this->statusConsumidorRepo->delete($statusConsumidor->id);
        $this->assertTrue($resp);
        $this->assertNull(StatusConsumidor::find($statusConsumidor->id), 'StatusConsumidor should not exist in DB');
    }
}

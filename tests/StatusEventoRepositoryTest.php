<?php

use App\Models\StatusEvento;
use App\Repositories\StatusEventoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatusEventoRepositoryTest extends TestCase
{
    use MakeStatusEventoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var StatusEventoRepository
     */
    protected $statusEventoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->statusEventoRepo = App::make(StatusEventoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateStatusEvento()
    {
        $statusEvento = $this->fakeStatusEventoData();
        $createdStatusEvento = $this->statusEventoRepo->create($statusEvento);
        $createdStatusEvento = $createdStatusEvento->toArray();
        $this->assertArrayHasKey('id', $createdStatusEvento);
        $this->assertNotNull($createdStatusEvento['id'], 'Created StatusEvento must have id specified');
        $this->assertNotNull(StatusEvento::find($createdStatusEvento['id']), 'StatusEvento with given id must be in DB');
        $this->assertModelData($statusEvento, $createdStatusEvento);
    }

    /**
     * @test read
     */
    public function testReadStatusEvento()
    {
        $statusEvento = $this->makeStatusEvento();
        $dbStatusEvento = $this->statusEventoRepo->find($statusEvento->id);
        $dbStatusEvento = $dbStatusEvento->toArray();
        $this->assertModelData($statusEvento->toArray(), $dbStatusEvento);
    }

    /**
     * @test update
     */
    public function testUpdateStatusEvento()
    {
        $statusEvento = $this->makeStatusEvento();
        $fakeStatusEvento = $this->fakeStatusEventoData();
        $updatedStatusEvento = $this->statusEventoRepo->update($fakeStatusEvento, $statusEvento->id);
        $this->assertModelData($fakeStatusEvento, $updatedStatusEvento->toArray());
        $dbStatusEvento = $this->statusEventoRepo->find($statusEvento->id);
        $this->assertModelData($fakeStatusEvento, $dbStatusEvento->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteStatusEvento()
    {
        $statusEvento = $this->makeStatusEvento();
        $resp = $this->statusEventoRepo->delete($statusEvento->id);
        $this->assertTrue($resp);
        $this->assertNull(StatusEvento::find($statusEvento->id), 'StatusEvento should not exist in DB');
    }
}

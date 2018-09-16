<?php

use App\Models\EventoPalavrasChave;
use App\Repositories\EventoPalavrasChaveRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventoPalavrasChaveRepositoryTest extends TestCase
{
    use MakeEventoPalavrasChaveTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var EventoPalavrasChaveRepository
     */
    protected $eventoPalavrasChaveRepo;

    public function setUp()
    {
        parent::setUp();
        $this->eventoPalavrasChaveRepo = App::make(EventoPalavrasChaveRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateEventoPalavrasChave()
    {
        $eventoPalavrasChave = $this->fakeEventoPalavrasChaveData();
        $createdEventoPalavrasChave = $this->eventoPalavrasChaveRepo->create($eventoPalavrasChave);
        $createdEventoPalavrasChave = $createdEventoPalavrasChave->toArray();
        $this->assertArrayHasKey('id', $createdEventoPalavrasChave);
        $this->assertNotNull($createdEventoPalavrasChave['id'], 'Created EventoPalavrasChave must have id specified');
        $this->assertNotNull(EventoPalavrasChave::find($createdEventoPalavrasChave['id']), 'EventoPalavrasChave with given id must be in DB');
        $this->assertModelData($eventoPalavrasChave, $createdEventoPalavrasChave);
    }

    /**
     * @test read
     */
    public function testReadEventoPalavrasChave()
    {
        $eventoPalavrasChave = $this->makeEventoPalavrasChave();
        $dbEventoPalavrasChave = $this->eventoPalavrasChaveRepo->find($eventoPalavrasChave->id);
        $dbEventoPalavrasChave = $dbEventoPalavrasChave->toArray();
        $this->assertModelData($eventoPalavrasChave->toArray(), $dbEventoPalavrasChave);
    }

    /**
     * @test update
     */
    public function testUpdateEventoPalavrasChave()
    {
        $eventoPalavrasChave = $this->makeEventoPalavrasChave();
        $fakeEventoPalavrasChave = $this->fakeEventoPalavrasChaveData();
        $updatedEventoPalavrasChave = $this->eventoPalavrasChaveRepo->update($fakeEventoPalavrasChave, $eventoPalavrasChave->id);
        $this->assertModelData($fakeEventoPalavrasChave, $updatedEventoPalavrasChave->toArray());
        $dbEventoPalavrasChave = $this->eventoPalavrasChaveRepo->find($eventoPalavrasChave->id);
        $this->assertModelData($fakeEventoPalavrasChave, $dbEventoPalavrasChave->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteEventoPalavrasChave()
    {
        $eventoPalavrasChave = $this->makeEventoPalavrasChave();
        $resp = $this->eventoPalavrasChaveRepo->delete($eventoPalavrasChave->id);
        $this->assertTrue($resp);
        $this->assertNull(EventoPalavrasChave::find($eventoPalavrasChave->id), 'EventoPalavrasChave should not exist in DB');
    }
}

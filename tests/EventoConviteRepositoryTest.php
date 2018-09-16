<?php

use App\Models\EventoConvite;
use App\Repositories\EventoConviteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventoConviteRepositoryTest extends TestCase
{
    use MakeEventoConviteTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var EventoConviteRepository
     */
    protected $eventoConviteRepo;

    public function setUp()
    {
        parent::setUp();
        $this->eventoConviteRepo = App::make(EventoConviteRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateEventoConvite()
    {
        $eventoConvite = $this->fakeEventoConviteData();
        $createdEventoConvite = $this->eventoConviteRepo->create($eventoConvite);
        $createdEventoConvite = $createdEventoConvite->toArray();
        $this->assertArrayHasKey('id', $createdEventoConvite);
        $this->assertNotNull($createdEventoConvite['id'], 'Created EventoConvite must have id specified');
        $this->assertNotNull(EventoConvite::find($createdEventoConvite['id']), 'EventoConvite with given id must be in DB');
        $this->assertModelData($eventoConvite, $createdEventoConvite);
    }

    /**
     * @test read
     */
    public function testReadEventoConvite()
    {
        $eventoConvite = $this->makeEventoConvite();
        $dbEventoConvite = $this->eventoConviteRepo->find($eventoConvite->id);
        $dbEventoConvite = $dbEventoConvite->toArray();
        $this->assertModelData($eventoConvite->toArray(), $dbEventoConvite);
    }

    /**
     * @test update
     */
    public function testUpdateEventoConvite()
    {
        $eventoConvite = $this->makeEventoConvite();
        $fakeEventoConvite = $this->fakeEventoConviteData();
        $updatedEventoConvite = $this->eventoConviteRepo->update($fakeEventoConvite, $eventoConvite->id);
        $this->assertModelData($fakeEventoConvite, $updatedEventoConvite->toArray());
        $dbEventoConvite = $this->eventoConviteRepo->find($eventoConvite->id);
        $this->assertModelData($fakeEventoConvite, $dbEventoConvite->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteEventoConvite()
    {
        $eventoConvite = $this->makeEventoConvite();
        $resp = $this->eventoConviteRepo->delete($eventoConvite->id);
        $this->assertTrue($resp);
        $this->assertNull(EventoConvite::find($eventoConvite->id), 'EventoConvite should not exist in DB');
    }
}

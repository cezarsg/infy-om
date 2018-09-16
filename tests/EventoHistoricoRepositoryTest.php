<?php

use App\Models\EventoHistorico;
use App\Repositories\EventoHistoricoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventoHistoricoRepositoryTest extends TestCase
{
    use MakeEventoHistoricoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var EventoHistoricoRepository
     */
    protected $eventoHistoricoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->eventoHistoricoRepo = App::make(EventoHistoricoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateEventoHistorico()
    {
        $eventoHistorico = $this->fakeEventoHistoricoData();
        $createdEventoHistorico = $this->eventoHistoricoRepo->create($eventoHistorico);
        $createdEventoHistorico = $createdEventoHistorico->toArray();
        $this->assertArrayHasKey('id', $createdEventoHistorico);
        $this->assertNotNull($createdEventoHistorico['id'], 'Created EventoHistorico must have id specified');
        $this->assertNotNull(EventoHistorico::find($createdEventoHistorico['id']), 'EventoHistorico with given id must be in DB');
        $this->assertModelData($eventoHistorico, $createdEventoHistorico);
    }

    /**
     * @test read
     */
    public function testReadEventoHistorico()
    {
        $eventoHistorico = $this->makeEventoHistorico();
        $dbEventoHistorico = $this->eventoHistoricoRepo->find($eventoHistorico->id);
        $dbEventoHistorico = $dbEventoHistorico->toArray();
        $this->assertModelData($eventoHistorico->toArray(), $dbEventoHistorico);
    }

    /**
     * @test update
     */
    public function testUpdateEventoHistorico()
    {
        $eventoHistorico = $this->makeEventoHistorico();
        $fakeEventoHistorico = $this->fakeEventoHistoricoData();
        $updatedEventoHistorico = $this->eventoHistoricoRepo->update($fakeEventoHistorico, $eventoHistorico->id);
        $this->assertModelData($fakeEventoHistorico, $updatedEventoHistorico->toArray());
        $dbEventoHistorico = $this->eventoHistoricoRepo->find($eventoHistorico->id);
        $this->assertModelData($fakeEventoHistorico, $dbEventoHistorico->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteEventoHistorico()
    {
        $eventoHistorico = $this->makeEventoHistorico();
        $resp = $this->eventoHistoricoRepo->delete($eventoHistorico->id);
        $this->assertTrue($resp);
        $this->assertNull(EventoHistorico::find($eventoHistorico->id), 'EventoHistorico should not exist in DB');
    }
}

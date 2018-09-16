<?php

use App\Models\EventoConvidados;
use App\Repositories\EventoConvidadosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventoConvidadosRepositoryTest extends TestCase
{
    use MakeEventoConvidadosTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var EventoConvidadosRepository
     */
    protected $eventoConvidadosRepo;

    public function setUp()
    {
        parent::setUp();
        $this->eventoConvidadosRepo = App::make(EventoConvidadosRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateEventoConvidados()
    {
        $eventoConvidados = $this->fakeEventoConvidadosData();
        $createdEventoConvidados = $this->eventoConvidadosRepo->create($eventoConvidados);
        $createdEventoConvidados = $createdEventoConvidados->toArray();
        $this->assertArrayHasKey('id', $createdEventoConvidados);
        $this->assertNotNull($createdEventoConvidados['id'], 'Created EventoConvidados must have id specified');
        $this->assertNotNull(EventoConvidados::find($createdEventoConvidados['id']), 'EventoConvidados with given id must be in DB');
        $this->assertModelData($eventoConvidados, $createdEventoConvidados);
    }

    /**
     * @test read
     */
    public function testReadEventoConvidados()
    {
        $eventoConvidados = $this->makeEventoConvidados();
        $dbEventoConvidados = $this->eventoConvidadosRepo->find($eventoConvidados->id);
        $dbEventoConvidados = $dbEventoConvidados->toArray();
        $this->assertModelData($eventoConvidados->toArray(), $dbEventoConvidados);
    }

    /**
     * @test update
     */
    public function testUpdateEventoConvidados()
    {
        $eventoConvidados = $this->makeEventoConvidados();
        $fakeEventoConvidados = $this->fakeEventoConvidadosData();
        $updatedEventoConvidados = $this->eventoConvidadosRepo->update($fakeEventoConvidados, $eventoConvidados->id);
        $this->assertModelData($fakeEventoConvidados, $updatedEventoConvidados->toArray());
        $dbEventoConvidados = $this->eventoConvidadosRepo->find($eventoConvidados->id);
        $this->assertModelData($fakeEventoConvidados, $dbEventoConvidados->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteEventoConvidados()
    {
        $eventoConvidados = $this->makeEventoConvidados();
        $resp = $this->eventoConvidadosRepo->delete($eventoConvidados->id);
        $this->assertTrue($resp);
        $this->assertNull(EventoConvidados::find($eventoConvidados->id), 'EventoConvidados should not exist in DB');
    }
}

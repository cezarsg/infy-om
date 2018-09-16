<?php

use App\Models\EventoServico;
use App\Repositories\EventoServicoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventoServicoRepositoryTest extends TestCase
{
    use MakeEventoServicoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var EventoServicoRepository
     */
    protected $eventoServicoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->eventoServicoRepo = App::make(EventoServicoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateEventoServico()
    {
        $eventoServico = $this->fakeEventoServicoData();
        $createdEventoServico = $this->eventoServicoRepo->create($eventoServico);
        $createdEventoServico = $createdEventoServico->toArray();
        $this->assertArrayHasKey('id', $createdEventoServico);
        $this->assertNotNull($createdEventoServico['id'], 'Created EventoServico must have id specified');
        $this->assertNotNull(EventoServico::find($createdEventoServico['id']), 'EventoServico with given id must be in DB');
        $this->assertModelData($eventoServico, $createdEventoServico);
    }

    /**
     * @test read
     */
    public function testReadEventoServico()
    {
        $eventoServico = $this->makeEventoServico();
        $dbEventoServico = $this->eventoServicoRepo->find($eventoServico->id);
        $dbEventoServico = $dbEventoServico->toArray();
        $this->assertModelData($eventoServico->toArray(), $dbEventoServico);
    }

    /**
     * @test update
     */
    public function testUpdateEventoServico()
    {
        $eventoServico = $this->makeEventoServico();
        $fakeEventoServico = $this->fakeEventoServicoData();
        $updatedEventoServico = $this->eventoServicoRepo->update($fakeEventoServico, $eventoServico->id);
        $this->assertModelData($fakeEventoServico, $updatedEventoServico->toArray());
        $dbEventoServico = $this->eventoServicoRepo->find($eventoServico->id);
        $this->assertModelData($fakeEventoServico, $dbEventoServico->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteEventoServico()
    {
        $eventoServico = $this->makeEventoServico();
        $resp = $this->eventoServicoRepo->delete($eventoServico->id);
        $this->assertTrue($resp);
        $this->assertNull(EventoServico::find($eventoServico->id), 'EventoServico should not exist in DB');
    }
}

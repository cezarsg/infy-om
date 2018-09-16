<?php

use App\Models\EventoMesas;
use App\Repositories\EventoMesasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventoMesasRepositoryTest extends TestCase
{
    use MakeEventoMesasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var EventoMesasRepository
     */
    protected $eventoMesasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->eventoMesasRepo = App::make(EventoMesasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateEventoMesas()
    {
        $eventoMesas = $this->fakeEventoMesasData();
        $createdEventoMesas = $this->eventoMesasRepo->create($eventoMesas);
        $createdEventoMesas = $createdEventoMesas->toArray();
        $this->assertArrayHasKey('id', $createdEventoMesas);
        $this->assertNotNull($createdEventoMesas['id'], 'Created EventoMesas must have id specified');
        $this->assertNotNull(EventoMesas::find($createdEventoMesas['id']), 'EventoMesas with given id must be in DB');
        $this->assertModelData($eventoMesas, $createdEventoMesas);
    }

    /**
     * @test read
     */
    public function testReadEventoMesas()
    {
        $eventoMesas = $this->makeEventoMesas();
        $dbEventoMesas = $this->eventoMesasRepo->find($eventoMesas->id);
        $dbEventoMesas = $dbEventoMesas->toArray();
        $this->assertModelData($eventoMesas->toArray(), $dbEventoMesas);
    }

    /**
     * @test update
     */
    public function testUpdateEventoMesas()
    {
        $eventoMesas = $this->makeEventoMesas();
        $fakeEventoMesas = $this->fakeEventoMesasData();
        $updatedEventoMesas = $this->eventoMesasRepo->update($fakeEventoMesas, $eventoMesas->id);
        $this->assertModelData($fakeEventoMesas, $updatedEventoMesas->toArray());
        $dbEventoMesas = $this->eventoMesasRepo->find($eventoMesas->id);
        $this->assertModelData($fakeEventoMesas, $dbEventoMesas->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteEventoMesas()
    {
        $eventoMesas = $this->makeEventoMesas();
        $resp = $this->eventoMesasRepo->delete($eventoMesas->id);
        $this->assertTrue($resp);
        $this->assertNull(EventoMesas::find($eventoMesas->id), 'EventoMesas should not exist in DB');
    }
}

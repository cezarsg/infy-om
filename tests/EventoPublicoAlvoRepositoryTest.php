<?php

use App\Models\EventoPublicoAlvo;
use App\Repositories\EventoPublicoAlvoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventoPublicoAlvoRepositoryTest extends TestCase
{
    use MakeEventoPublicoAlvoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var EventoPublicoAlvoRepository
     */
    protected $eventoPublicoAlvoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->eventoPublicoAlvoRepo = App::make(EventoPublicoAlvoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateEventoPublicoAlvo()
    {
        $eventoPublicoAlvo = $this->fakeEventoPublicoAlvoData();
        $createdEventoPublicoAlvo = $this->eventoPublicoAlvoRepo->create($eventoPublicoAlvo);
        $createdEventoPublicoAlvo = $createdEventoPublicoAlvo->toArray();
        $this->assertArrayHasKey('id', $createdEventoPublicoAlvo);
        $this->assertNotNull($createdEventoPublicoAlvo['id'], 'Created EventoPublicoAlvo must have id specified');
        $this->assertNotNull(EventoPublicoAlvo::find($createdEventoPublicoAlvo['id']), 'EventoPublicoAlvo with given id must be in DB');
        $this->assertModelData($eventoPublicoAlvo, $createdEventoPublicoAlvo);
    }

    /**
     * @test read
     */
    public function testReadEventoPublicoAlvo()
    {
        $eventoPublicoAlvo = $this->makeEventoPublicoAlvo();
        $dbEventoPublicoAlvo = $this->eventoPublicoAlvoRepo->find($eventoPublicoAlvo->id);
        $dbEventoPublicoAlvo = $dbEventoPublicoAlvo->toArray();
        $this->assertModelData($eventoPublicoAlvo->toArray(), $dbEventoPublicoAlvo);
    }

    /**
     * @test update
     */
    public function testUpdateEventoPublicoAlvo()
    {
        $eventoPublicoAlvo = $this->makeEventoPublicoAlvo();
        $fakeEventoPublicoAlvo = $this->fakeEventoPublicoAlvoData();
        $updatedEventoPublicoAlvo = $this->eventoPublicoAlvoRepo->update($fakeEventoPublicoAlvo, $eventoPublicoAlvo->id);
        $this->assertModelData($fakeEventoPublicoAlvo, $updatedEventoPublicoAlvo->toArray());
        $dbEventoPublicoAlvo = $this->eventoPublicoAlvoRepo->find($eventoPublicoAlvo->id);
        $this->assertModelData($fakeEventoPublicoAlvo, $dbEventoPublicoAlvo->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteEventoPublicoAlvo()
    {
        $eventoPublicoAlvo = $this->makeEventoPublicoAlvo();
        $resp = $this->eventoPublicoAlvoRepo->delete($eventoPublicoAlvo->id);
        $this->assertTrue($resp);
        $this->assertNull(EventoPublicoAlvo::find($eventoPublicoAlvo->id), 'EventoPublicoAlvo should not exist in DB');
    }
}

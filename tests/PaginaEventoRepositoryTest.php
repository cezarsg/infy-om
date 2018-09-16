<?php

use App\Models\PaginaEvento;
use App\Repositories\PaginaEventoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PaginaEventoRepositoryTest extends TestCase
{
    use MakePaginaEventoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PaginaEventoRepository
     */
    protected $paginaEventoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->paginaEventoRepo = App::make(PaginaEventoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePaginaEvento()
    {
        $paginaEvento = $this->fakePaginaEventoData();
        $createdPaginaEvento = $this->paginaEventoRepo->create($paginaEvento);
        $createdPaginaEvento = $createdPaginaEvento->toArray();
        $this->assertArrayHasKey('id', $createdPaginaEvento);
        $this->assertNotNull($createdPaginaEvento['id'], 'Created PaginaEvento must have id specified');
        $this->assertNotNull(PaginaEvento::find($createdPaginaEvento['id']), 'PaginaEvento with given id must be in DB');
        $this->assertModelData($paginaEvento, $createdPaginaEvento);
    }

    /**
     * @test read
     */
    public function testReadPaginaEvento()
    {
        $paginaEvento = $this->makePaginaEvento();
        $dbPaginaEvento = $this->paginaEventoRepo->find($paginaEvento->id);
        $dbPaginaEvento = $dbPaginaEvento->toArray();
        $this->assertModelData($paginaEvento->toArray(), $dbPaginaEvento);
    }

    /**
     * @test update
     */
    public function testUpdatePaginaEvento()
    {
        $paginaEvento = $this->makePaginaEvento();
        $fakePaginaEvento = $this->fakePaginaEventoData();
        $updatedPaginaEvento = $this->paginaEventoRepo->update($fakePaginaEvento, $paginaEvento->id);
        $this->assertModelData($fakePaginaEvento, $updatedPaginaEvento->toArray());
        $dbPaginaEvento = $this->paginaEventoRepo->find($paginaEvento->id);
        $this->assertModelData($fakePaginaEvento, $dbPaginaEvento->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePaginaEvento()
    {
        $paginaEvento = $this->makePaginaEvento();
        $resp = $this->paginaEventoRepo->delete($paginaEvento->id);
        $this->assertTrue($resp);
        $this->assertNull(PaginaEvento::find($paginaEvento->id), 'PaginaEvento should not exist in DB');
    }
}

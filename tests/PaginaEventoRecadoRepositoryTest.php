<?php

use App\Models\PaginaEventoRecado;
use App\Repositories\PaginaEventoRecadoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PaginaEventoRecadoRepositoryTest extends TestCase
{
    use MakePaginaEventoRecadoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PaginaEventoRecadoRepository
     */
    protected $paginaEventoRecadoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->paginaEventoRecadoRepo = App::make(PaginaEventoRecadoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePaginaEventoRecado()
    {
        $paginaEventoRecado = $this->fakePaginaEventoRecadoData();
        $createdPaginaEventoRecado = $this->paginaEventoRecadoRepo->create($paginaEventoRecado);
        $createdPaginaEventoRecado = $createdPaginaEventoRecado->toArray();
        $this->assertArrayHasKey('id', $createdPaginaEventoRecado);
        $this->assertNotNull($createdPaginaEventoRecado['id'], 'Created PaginaEventoRecado must have id specified');
        $this->assertNotNull(PaginaEventoRecado::find($createdPaginaEventoRecado['id']), 'PaginaEventoRecado with given id must be in DB');
        $this->assertModelData($paginaEventoRecado, $createdPaginaEventoRecado);
    }

    /**
     * @test read
     */
    public function testReadPaginaEventoRecado()
    {
        $paginaEventoRecado = $this->makePaginaEventoRecado();
        $dbPaginaEventoRecado = $this->paginaEventoRecadoRepo->find($paginaEventoRecado->id);
        $dbPaginaEventoRecado = $dbPaginaEventoRecado->toArray();
        $this->assertModelData($paginaEventoRecado->toArray(), $dbPaginaEventoRecado);
    }

    /**
     * @test update
     */
    public function testUpdatePaginaEventoRecado()
    {
        $paginaEventoRecado = $this->makePaginaEventoRecado();
        $fakePaginaEventoRecado = $this->fakePaginaEventoRecadoData();
        $updatedPaginaEventoRecado = $this->paginaEventoRecadoRepo->update($fakePaginaEventoRecado, $paginaEventoRecado->id);
        $this->assertModelData($fakePaginaEventoRecado, $updatedPaginaEventoRecado->toArray());
        $dbPaginaEventoRecado = $this->paginaEventoRecadoRepo->find($paginaEventoRecado->id);
        $this->assertModelData($fakePaginaEventoRecado, $dbPaginaEventoRecado->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePaginaEventoRecado()
    {
        $paginaEventoRecado = $this->makePaginaEventoRecado();
        $resp = $this->paginaEventoRecadoRepo->delete($paginaEventoRecado->id);
        $this->assertTrue($resp);
        $this->assertNull(PaginaEventoRecado::find($paginaEventoRecado->id), 'PaginaEventoRecado should not exist in DB');
    }
}

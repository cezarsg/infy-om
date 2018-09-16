<?php

use App\Models\PaginaEventoFotos;
use App\Repositories\PaginaEventoFotosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PaginaEventoFotosRepositoryTest extends TestCase
{
    use MakePaginaEventoFotosTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PaginaEventoFotosRepository
     */
    protected $paginaEventoFotosRepo;

    public function setUp()
    {
        parent::setUp();
        $this->paginaEventoFotosRepo = App::make(PaginaEventoFotosRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePaginaEventoFotos()
    {
        $paginaEventoFotos = $this->fakePaginaEventoFotosData();
        $createdPaginaEventoFotos = $this->paginaEventoFotosRepo->create($paginaEventoFotos);
        $createdPaginaEventoFotos = $createdPaginaEventoFotos->toArray();
        $this->assertArrayHasKey('id', $createdPaginaEventoFotos);
        $this->assertNotNull($createdPaginaEventoFotos['id'], 'Created PaginaEventoFotos must have id specified');
        $this->assertNotNull(PaginaEventoFotos::find($createdPaginaEventoFotos['id']), 'PaginaEventoFotos with given id must be in DB');
        $this->assertModelData($paginaEventoFotos, $createdPaginaEventoFotos);
    }

    /**
     * @test read
     */
    public function testReadPaginaEventoFotos()
    {
        $paginaEventoFotos = $this->makePaginaEventoFotos();
        $dbPaginaEventoFotos = $this->paginaEventoFotosRepo->find($paginaEventoFotos->id);
        $dbPaginaEventoFotos = $dbPaginaEventoFotos->toArray();
        $this->assertModelData($paginaEventoFotos->toArray(), $dbPaginaEventoFotos);
    }

    /**
     * @test update
     */
    public function testUpdatePaginaEventoFotos()
    {
        $paginaEventoFotos = $this->makePaginaEventoFotos();
        $fakePaginaEventoFotos = $this->fakePaginaEventoFotosData();
        $updatedPaginaEventoFotos = $this->paginaEventoFotosRepo->update($fakePaginaEventoFotos, $paginaEventoFotos->id);
        $this->assertModelData($fakePaginaEventoFotos, $updatedPaginaEventoFotos->toArray());
        $dbPaginaEventoFotos = $this->paginaEventoFotosRepo->find($paginaEventoFotos->id);
        $this->assertModelData($fakePaginaEventoFotos, $dbPaginaEventoFotos->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePaginaEventoFotos()
    {
        $paginaEventoFotos = $this->makePaginaEventoFotos();
        $resp = $this->paginaEventoFotosRepo->delete($paginaEventoFotos->id);
        $this->assertTrue($resp);
        $this->assertNull(PaginaEventoFotos::find($paginaEventoFotos->id), 'PaginaEventoFotos should not exist in DB');
    }
}

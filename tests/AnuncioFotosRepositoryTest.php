<?php

use App\Models\AnuncioFotos;
use App\Repositories\AnuncioFotosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnuncioFotosRepositoryTest extends TestCase
{
    use MakeAnuncioFotosTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AnuncioFotosRepository
     */
    protected $anuncioFotosRepo;

    public function setUp()
    {
        parent::setUp();
        $this->anuncioFotosRepo = App::make(AnuncioFotosRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAnuncioFotos()
    {
        $anuncioFotos = $this->fakeAnuncioFotosData();
        $createdAnuncioFotos = $this->anuncioFotosRepo->create($anuncioFotos);
        $createdAnuncioFotos = $createdAnuncioFotos->toArray();
        $this->assertArrayHasKey('id', $createdAnuncioFotos);
        $this->assertNotNull($createdAnuncioFotos['id'], 'Created AnuncioFotos must have id specified');
        $this->assertNotNull(AnuncioFotos::find($createdAnuncioFotos['id']), 'AnuncioFotos with given id must be in DB');
        $this->assertModelData($anuncioFotos, $createdAnuncioFotos);
    }

    /**
     * @test read
     */
    public function testReadAnuncioFotos()
    {
        $anuncioFotos = $this->makeAnuncioFotos();
        $dbAnuncioFotos = $this->anuncioFotosRepo->find($anuncioFotos->id);
        $dbAnuncioFotos = $dbAnuncioFotos->toArray();
        $this->assertModelData($anuncioFotos->toArray(), $dbAnuncioFotos);
    }

    /**
     * @test update
     */
    public function testUpdateAnuncioFotos()
    {
        $anuncioFotos = $this->makeAnuncioFotos();
        $fakeAnuncioFotos = $this->fakeAnuncioFotosData();
        $updatedAnuncioFotos = $this->anuncioFotosRepo->update($fakeAnuncioFotos, $anuncioFotos->id);
        $this->assertModelData($fakeAnuncioFotos, $updatedAnuncioFotos->toArray());
        $dbAnuncioFotos = $this->anuncioFotosRepo->find($anuncioFotos->id);
        $this->assertModelData($fakeAnuncioFotos, $dbAnuncioFotos->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAnuncioFotos()
    {
        $anuncioFotos = $this->makeAnuncioFotos();
        $resp = $this->anuncioFotosRepo->delete($anuncioFotos->id);
        $this->assertTrue($resp);
        $this->assertNull(AnuncioFotos::find($anuncioFotos->id), 'AnuncioFotos should not exist in DB');
    }
}

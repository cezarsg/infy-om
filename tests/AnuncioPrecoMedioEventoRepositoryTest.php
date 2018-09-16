<?php

use App\Models\AnuncioPrecoMedioEvento;
use App\Repositories\AnuncioPrecoMedioEventoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnuncioPrecoMedioEventoRepositoryTest extends TestCase
{
    use MakeAnuncioPrecoMedioEventoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AnuncioPrecoMedioEventoRepository
     */
    protected $anuncioPrecoMedioEventoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->anuncioPrecoMedioEventoRepo = App::make(AnuncioPrecoMedioEventoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAnuncioPrecoMedioEvento()
    {
        $anuncioPrecoMedioEvento = $this->fakeAnuncioPrecoMedioEventoData();
        $createdAnuncioPrecoMedioEvento = $this->anuncioPrecoMedioEventoRepo->create($anuncioPrecoMedioEvento);
        $createdAnuncioPrecoMedioEvento = $createdAnuncioPrecoMedioEvento->toArray();
        $this->assertArrayHasKey('id', $createdAnuncioPrecoMedioEvento);
        $this->assertNotNull($createdAnuncioPrecoMedioEvento['id'], 'Created AnuncioPrecoMedioEvento must have id specified');
        $this->assertNotNull(AnuncioPrecoMedioEvento::find($createdAnuncioPrecoMedioEvento['id']), 'AnuncioPrecoMedioEvento with given id must be in DB');
        $this->assertModelData($anuncioPrecoMedioEvento, $createdAnuncioPrecoMedioEvento);
    }

    /**
     * @test read
     */
    public function testReadAnuncioPrecoMedioEvento()
    {
        $anuncioPrecoMedioEvento = $this->makeAnuncioPrecoMedioEvento();
        $dbAnuncioPrecoMedioEvento = $this->anuncioPrecoMedioEventoRepo->find($anuncioPrecoMedioEvento->id);
        $dbAnuncioPrecoMedioEvento = $dbAnuncioPrecoMedioEvento->toArray();
        $this->assertModelData($anuncioPrecoMedioEvento->toArray(), $dbAnuncioPrecoMedioEvento);
    }

    /**
     * @test update
     */
    public function testUpdateAnuncioPrecoMedioEvento()
    {
        $anuncioPrecoMedioEvento = $this->makeAnuncioPrecoMedioEvento();
        $fakeAnuncioPrecoMedioEvento = $this->fakeAnuncioPrecoMedioEventoData();
        $updatedAnuncioPrecoMedioEvento = $this->anuncioPrecoMedioEventoRepo->update($fakeAnuncioPrecoMedioEvento, $anuncioPrecoMedioEvento->id);
        $this->assertModelData($fakeAnuncioPrecoMedioEvento, $updatedAnuncioPrecoMedioEvento->toArray());
        $dbAnuncioPrecoMedioEvento = $this->anuncioPrecoMedioEventoRepo->find($anuncioPrecoMedioEvento->id);
        $this->assertModelData($fakeAnuncioPrecoMedioEvento, $dbAnuncioPrecoMedioEvento->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAnuncioPrecoMedioEvento()
    {
        $anuncioPrecoMedioEvento = $this->makeAnuncioPrecoMedioEvento();
        $resp = $this->anuncioPrecoMedioEventoRepo->delete($anuncioPrecoMedioEvento->id);
        $this->assertTrue($resp);
        $this->assertNull(AnuncioPrecoMedioEvento::find($anuncioPrecoMedioEvento->id), 'AnuncioPrecoMedioEvento should not exist in DB');
    }
}

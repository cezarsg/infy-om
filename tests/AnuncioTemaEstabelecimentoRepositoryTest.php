<?php

use App\Models\AnuncioTemaEstabelecimento;
use App\Repositories\AnuncioTemaEstabelecimentoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnuncioTemaEstabelecimentoRepositoryTest extends TestCase
{
    use MakeAnuncioTemaEstabelecimentoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AnuncioTemaEstabelecimentoRepository
     */
    protected $anuncioTemaEstabelecimentoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->anuncioTemaEstabelecimentoRepo = App::make(AnuncioTemaEstabelecimentoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAnuncioTemaEstabelecimento()
    {
        $anuncioTemaEstabelecimento = $this->fakeAnuncioTemaEstabelecimentoData();
        $createdAnuncioTemaEstabelecimento = $this->anuncioTemaEstabelecimentoRepo->create($anuncioTemaEstabelecimento);
        $createdAnuncioTemaEstabelecimento = $createdAnuncioTemaEstabelecimento->toArray();
        $this->assertArrayHasKey('id', $createdAnuncioTemaEstabelecimento);
        $this->assertNotNull($createdAnuncioTemaEstabelecimento['id'], 'Created AnuncioTemaEstabelecimento must have id specified');
        $this->assertNotNull(AnuncioTemaEstabelecimento::find($createdAnuncioTemaEstabelecimento['id']), 'AnuncioTemaEstabelecimento with given id must be in DB');
        $this->assertModelData($anuncioTemaEstabelecimento, $createdAnuncioTemaEstabelecimento);
    }

    /**
     * @test read
     */
    public function testReadAnuncioTemaEstabelecimento()
    {
        $anuncioTemaEstabelecimento = $this->makeAnuncioTemaEstabelecimento();
        $dbAnuncioTemaEstabelecimento = $this->anuncioTemaEstabelecimentoRepo->find($anuncioTemaEstabelecimento->id);
        $dbAnuncioTemaEstabelecimento = $dbAnuncioTemaEstabelecimento->toArray();
        $this->assertModelData($anuncioTemaEstabelecimento->toArray(), $dbAnuncioTemaEstabelecimento);
    }

    /**
     * @test update
     */
    public function testUpdateAnuncioTemaEstabelecimento()
    {
        $anuncioTemaEstabelecimento = $this->makeAnuncioTemaEstabelecimento();
        $fakeAnuncioTemaEstabelecimento = $this->fakeAnuncioTemaEstabelecimentoData();
        $updatedAnuncioTemaEstabelecimento = $this->anuncioTemaEstabelecimentoRepo->update($fakeAnuncioTemaEstabelecimento, $anuncioTemaEstabelecimento->id);
        $this->assertModelData($fakeAnuncioTemaEstabelecimento, $updatedAnuncioTemaEstabelecimento->toArray());
        $dbAnuncioTemaEstabelecimento = $this->anuncioTemaEstabelecimentoRepo->find($anuncioTemaEstabelecimento->id);
        $this->assertModelData($fakeAnuncioTemaEstabelecimento, $dbAnuncioTemaEstabelecimento->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAnuncioTemaEstabelecimento()
    {
        $anuncioTemaEstabelecimento = $this->makeAnuncioTemaEstabelecimento();
        $resp = $this->anuncioTemaEstabelecimentoRepo->delete($anuncioTemaEstabelecimento->id);
        $this->assertTrue($resp);
        $this->assertNull(AnuncioTemaEstabelecimento::find($anuncioTemaEstabelecimento->id), 'AnuncioTemaEstabelecimento should not exist in DB');
    }
}

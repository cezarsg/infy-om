<?php

use App\Models\AnuncioAvaliacao;
use App\Repositories\AnuncioAvaliacaoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnuncioAvaliacaoRepositoryTest extends TestCase
{
    use MakeAnuncioAvaliacaoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AnuncioAvaliacaoRepository
     */
    protected $anuncioAvaliacaoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->anuncioAvaliacaoRepo = App::make(AnuncioAvaliacaoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAnuncioAvaliacao()
    {
        $anuncioAvaliacao = $this->fakeAnuncioAvaliacaoData();
        $createdAnuncioAvaliacao = $this->anuncioAvaliacaoRepo->create($anuncioAvaliacao);
        $createdAnuncioAvaliacao = $createdAnuncioAvaliacao->toArray();
        $this->assertArrayHasKey('id', $createdAnuncioAvaliacao);
        $this->assertNotNull($createdAnuncioAvaliacao['id'], 'Created AnuncioAvaliacao must have id specified');
        $this->assertNotNull(AnuncioAvaliacao::find($createdAnuncioAvaliacao['id']), 'AnuncioAvaliacao with given id must be in DB');
        $this->assertModelData($anuncioAvaliacao, $createdAnuncioAvaliacao);
    }

    /**
     * @test read
     */
    public function testReadAnuncioAvaliacao()
    {
        $anuncioAvaliacao = $this->makeAnuncioAvaliacao();
        $dbAnuncioAvaliacao = $this->anuncioAvaliacaoRepo->find($anuncioAvaliacao->id);
        $dbAnuncioAvaliacao = $dbAnuncioAvaliacao->toArray();
        $this->assertModelData($anuncioAvaliacao->toArray(), $dbAnuncioAvaliacao);
    }

    /**
     * @test update
     */
    public function testUpdateAnuncioAvaliacao()
    {
        $anuncioAvaliacao = $this->makeAnuncioAvaliacao();
        $fakeAnuncioAvaliacao = $this->fakeAnuncioAvaliacaoData();
        $updatedAnuncioAvaliacao = $this->anuncioAvaliacaoRepo->update($fakeAnuncioAvaliacao, $anuncioAvaliacao->id);
        $this->assertModelData($fakeAnuncioAvaliacao, $updatedAnuncioAvaliacao->toArray());
        $dbAnuncioAvaliacao = $this->anuncioAvaliacaoRepo->find($anuncioAvaliacao->id);
        $this->assertModelData($fakeAnuncioAvaliacao, $dbAnuncioAvaliacao->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAnuncioAvaliacao()
    {
        $anuncioAvaliacao = $this->makeAnuncioAvaliacao();
        $resp = $this->anuncioAvaliacaoRepo->delete($anuncioAvaliacao->id);
        $this->assertTrue($resp);
        $this->assertNull(AnuncioAvaliacao::find($anuncioAvaliacao->id), 'AnuncioAvaliacao should not exist in DB');
    }
}

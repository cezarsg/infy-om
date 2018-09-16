<?php

use App\Models\AnuncioAbrangenciaAtuacao;
use App\Repositories\AnuncioAbrangenciaAtuacaoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnuncioAbrangenciaAtuacaoRepositoryTest extends TestCase
{
    use MakeAnuncioAbrangenciaAtuacaoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AnuncioAbrangenciaAtuacaoRepository
     */
    protected $anuncioAbrangenciaAtuacaoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->anuncioAbrangenciaAtuacaoRepo = App::make(AnuncioAbrangenciaAtuacaoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAnuncioAbrangenciaAtuacao()
    {
        $anuncioAbrangenciaAtuacao = $this->fakeAnuncioAbrangenciaAtuacaoData();
        $createdAnuncioAbrangenciaAtuacao = $this->anuncioAbrangenciaAtuacaoRepo->create($anuncioAbrangenciaAtuacao);
        $createdAnuncioAbrangenciaAtuacao = $createdAnuncioAbrangenciaAtuacao->toArray();
        $this->assertArrayHasKey('id', $createdAnuncioAbrangenciaAtuacao);
        $this->assertNotNull($createdAnuncioAbrangenciaAtuacao['id'], 'Created AnuncioAbrangenciaAtuacao must have id specified');
        $this->assertNotNull(AnuncioAbrangenciaAtuacao::find($createdAnuncioAbrangenciaAtuacao['id']), 'AnuncioAbrangenciaAtuacao with given id must be in DB');
        $this->assertModelData($anuncioAbrangenciaAtuacao, $createdAnuncioAbrangenciaAtuacao);
    }

    /**
     * @test read
     */
    public function testReadAnuncioAbrangenciaAtuacao()
    {
        $anuncioAbrangenciaAtuacao = $this->makeAnuncioAbrangenciaAtuacao();
        $dbAnuncioAbrangenciaAtuacao = $this->anuncioAbrangenciaAtuacaoRepo->find($anuncioAbrangenciaAtuacao->id);
        $dbAnuncioAbrangenciaAtuacao = $dbAnuncioAbrangenciaAtuacao->toArray();
        $this->assertModelData($anuncioAbrangenciaAtuacao->toArray(), $dbAnuncioAbrangenciaAtuacao);
    }

    /**
     * @test update
     */
    public function testUpdateAnuncioAbrangenciaAtuacao()
    {
        $anuncioAbrangenciaAtuacao = $this->makeAnuncioAbrangenciaAtuacao();
        $fakeAnuncioAbrangenciaAtuacao = $this->fakeAnuncioAbrangenciaAtuacaoData();
        $updatedAnuncioAbrangenciaAtuacao = $this->anuncioAbrangenciaAtuacaoRepo->update($fakeAnuncioAbrangenciaAtuacao, $anuncioAbrangenciaAtuacao->id);
        $this->assertModelData($fakeAnuncioAbrangenciaAtuacao, $updatedAnuncioAbrangenciaAtuacao->toArray());
        $dbAnuncioAbrangenciaAtuacao = $this->anuncioAbrangenciaAtuacaoRepo->find($anuncioAbrangenciaAtuacao->id);
        $this->assertModelData($fakeAnuncioAbrangenciaAtuacao, $dbAnuncioAbrangenciaAtuacao->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAnuncioAbrangenciaAtuacao()
    {
        $anuncioAbrangenciaAtuacao = $this->makeAnuncioAbrangenciaAtuacao();
        $resp = $this->anuncioAbrangenciaAtuacaoRepo->delete($anuncioAbrangenciaAtuacao->id);
        $this->assertTrue($resp);
        $this->assertNull(AnuncioAbrangenciaAtuacao::find($anuncioAbrangenciaAtuacao->id), 'AnuncioAbrangenciaAtuacao should not exist in DB');
    }
}

<?php

use App\Models\TemaEstabelecimento;
use App\Repositories\TemaEstabelecimentoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TemaEstabelecimentoRepositoryTest extends TestCase
{
    use MakeTemaEstabelecimentoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TemaEstabelecimentoRepository
     */
    protected $temaEstabelecimentoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->temaEstabelecimentoRepo = App::make(TemaEstabelecimentoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTemaEstabelecimento()
    {
        $temaEstabelecimento = $this->fakeTemaEstabelecimentoData();
        $createdTemaEstabelecimento = $this->temaEstabelecimentoRepo->create($temaEstabelecimento);
        $createdTemaEstabelecimento = $createdTemaEstabelecimento->toArray();
        $this->assertArrayHasKey('id', $createdTemaEstabelecimento);
        $this->assertNotNull($createdTemaEstabelecimento['id'], 'Created TemaEstabelecimento must have id specified');
        $this->assertNotNull(TemaEstabelecimento::find($createdTemaEstabelecimento['id']), 'TemaEstabelecimento with given id must be in DB');
        $this->assertModelData($temaEstabelecimento, $createdTemaEstabelecimento);
    }

    /**
     * @test read
     */
    public function testReadTemaEstabelecimento()
    {
        $temaEstabelecimento = $this->makeTemaEstabelecimento();
        $dbTemaEstabelecimento = $this->temaEstabelecimentoRepo->find($temaEstabelecimento->id);
        $dbTemaEstabelecimento = $dbTemaEstabelecimento->toArray();
        $this->assertModelData($temaEstabelecimento->toArray(), $dbTemaEstabelecimento);
    }

    /**
     * @test update
     */
    public function testUpdateTemaEstabelecimento()
    {
        $temaEstabelecimento = $this->makeTemaEstabelecimento();
        $fakeTemaEstabelecimento = $this->fakeTemaEstabelecimentoData();
        $updatedTemaEstabelecimento = $this->temaEstabelecimentoRepo->update($fakeTemaEstabelecimento, $temaEstabelecimento->id);
        $this->assertModelData($fakeTemaEstabelecimento, $updatedTemaEstabelecimento->toArray());
        $dbTemaEstabelecimento = $this->temaEstabelecimentoRepo->find($temaEstabelecimento->id);
        $this->assertModelData($fakeTemaEstabelecimento, $dbTemaEstabelecimento->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTemaEstabelecimento()
    {
        $temaEstabelecimento = $this->makeTemaEstabelecimento();
        $resp = $this->temaEstabelecimentoRepo->delete($temaEstabelecimento->id);
        $this->assertTrue($resp);
        $this->assertNull(TemaEstabelecimento::find($temaEstabelecimento->id), 'TemaEstabelecimento should not exist in DB');
    }
}

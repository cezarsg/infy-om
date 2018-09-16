<?php

use App\Models\OrcamentoAvulso;
use App\Repositories\OrcamentoAvulsoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrcamentoAvulsoRepositoryTest extends TestCase
{
    use MakeOrcamentoAvulsoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var OrcamentoAvulsoRepository
     */
    protected $orcamentoAvulsoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->orcamentoAvulsoRepo = App::make(OrcamentoAvulsoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateOrcamentoAvulso()
    {
        $orcamentoAvulso = $this->fakeOrcamentoAvulsoData();
        $createdOrcamentoAvulso = $this->orcamentoAvulsoRepo->create($orcamentoAvulso);
        $createdOrcamentoAvulso = $createdOrcamentoAvulso->toArray();
        $this->assertArrayHasKey('id', $createdOrcamentoAvulso);
        $this->assertNotNull($createdOrcamentoAvulso['id'], 'Created OrcamentoAvulso must have id specified');
        $this->assertNotNull(OrcamentoAvulso::find($createdOrcamentoAvulso['id']), 'OrcamentoAvulso with given id must be in DB');
        $this->assertModelData($orcamentoAvulso, $createdOrcamentoAvulso);
    }

    /**
     * @test read
     */
    public function testReadOrcamentoAvulso()
    {
        $orcamentoAvulso = $this->makeOrcamentoAvulso();
        $dbOrcamentoAvulso = $this->orcamentoAvulsoRepo->find($orcamentoAvulso->id);
        $dbOrcamentoAvulso = $dbOrcamentoAvulso->toArray();
        $this->assertModelData($orcamentoAvulso->toArray(), $dbOrcamentoAvulso);
    }

    /**
     * @test update
     */
    public function testUpdateOrcamentoAvulso()
    {
        $orcamentoAvulso = $this->makeOrcamentoAvulso();
        $fakeOrcamentoAvulso = $this->fakeOrcamentoAvulsoData();
        $updatedOrcamentoAvulso = $this->orcamentoAvulsoRepo->update($fakeOrcamentoAvulso, $orcamentoAvulso->id);
        $this->assertModelData($fakeOrcamentoAvulso, $updatedOrcamentoAvulso->toArray());
        $dbOrcamentoAvulso = $this->orcamentoAvulsoRepo->find($orcamentoAvulso->id);
        $this->assertModelData($fakeOrcamentoAvulso, $dbOrcamentoAvulso->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteOrcamentoAvulso()
    {
        $orcamentoAvulso = $this->makeOrcamentoAvulso();
        $resp = $this->orcamentoAvulsoRepo->delete($orcamentoAvulso->id);
        $this->assertTrue($resp);
        $this->assertNull(OrcamentoAvulso::find($orcamentoAvulso->id), 'OrcamentoAvulso should not exist in DB');
    }
}

<?php

use App\Models\Orcamento;
use App\Repositories\OrcamentoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrcamentoRepositoryTest extends TestCase
{
    use MakeOrcamentoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var OrcamentoRepository
     */
    protected $orcamentoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->orcamentoRepo = App::make(OrcamentoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateOrcamento()
    {
        $orcamento = $this->fakeOrcamentoData();
        $createdOrcamento = $this->orcamentoRepo->create($orcamento);
        $createdOrcamento = $createdOrcamento->toArray();
        $this->assertArrayHasKey('id', $createdOrcamento);
        $this->assertNotNull($createdOrcamento['id'], 'Created Orcamento must have id specified');
        $this->assertNotNull(Orcamento::find($createdOrcamento['id']), 'Orcamento with given id must be in DB');
        $this->assertModelData($orcamento, $createdOrcamento);
    }

    /**
     * @test read
     */
    public function testReadOrcamento()
    {
        $orcamento = $this->makeOrcamento();
        $dbOrcamento = $this->orcamentoRepo->find($orcamento->id);
        $dbOrcamento = $dbOrcamento->toArray();
        $this->assertModelData($orcamento->toArray(), $dbOrcamento);
    }

    /**
     * @test update
     */
    public function testUpdateOrcamento()
    {
        $orcamento = $this->makeOrcamento();
        $fakeOrcamento = $this->fakeOrcamentoData();
        $updatedOrcamento = $this->orcamentoRepo->update($fakeOrcamento, $orcamento->id);
        $this->assertModelData($fakeOrcamento, $updatedOrcamento->toArray());
        $dbOrcamento = $this->orcamentoRepo->find($orcamento->id);
        $this->assertModelData($fakeOrcamento, $dbOrcamento->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteOrcamento()
    {
        $orcamento = $this->makeOrcamento();
        $resp = $this->orcamentoRepo->delete($orcamento->id);
        $this->assertTrue($resp);
        $this->assertNull(Orcamento::find($orcamento->id), 'Orcamento should not exist in DB');
    }
}

<?php

use App\Models\StatusOrcamento;
use App\Repositories\StatusOrcamentoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatusOrcamentoRepositoryTest extends TestCase
{
    use MakeStatusOrcamentoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var StatusOrcamentoRepository
     */
    protected $statusOrcamentoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->statusOrcamentoRepo = App::make(StatusOrcamentoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateStatusOrcamento()
    {
        $statusOrcamento = $this->fakeStatusOrcamentoData();
        $createdStatusOrcamento = $this->statusOrcamentoRepo->create($statusOrcamento);
        $createdStatusOrcamento = $createdStatusOrcamento->toArray();
        $this->assertArrayHasKey('id', $createdStatusOrcamento);
        $this->assertNotNull($createdStatusOrcamento['id'], 'Created StatusOrcamento must have id specified');
        $this->assertNotNull(StatusOrcamento::find($createdStatusOrcamento['id']), 'StatusOrcamento with given id must be in DB');
        $this->assertModelData($statusOrcamento, $createdStatusOrcamento);
    }

    /**
     * @test read
     */
    public function testReadStatusOrcamento()
    {
        $statusOrcamento = $this->makeStatusOrcamento();
        $dbStatusOrcamento = $this->statusOrcamentoRepo->find($statusOrcamento->id);
        $dbStatusOrcamento = $dbStatusOrcamento->toArray();
        $this->assertModelData($statusOrcamento->toArray(), $dbStatusOrcamento);
    }

    /**
     * @test update
     */
    public function testUpdateStatusOrcamento()
    {
        $statusOrcamento = $this->makeStatusOrcamento();
        $fakeStatusOrcamento = $this->fakeStatusOrcamentoData();
        $updatedStatusOrcamento = $this->statusOrcamentoRepo->update($fakeStatusOrcamento, $statusOrcamento->id);
        $this->assertModelData($fakeStatusOrcamento, $updatedStatusOrcamento->toArray());
        $dbStatusOrcamento = $this->statusOrcamentoRepo->find($statusOrcamento->id);
        $this->assertModelData($fakeStatusOrcamento, $dbStatusOrcamento->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteStatusOrcamento()
    {
        $statusOrcamento = $this->makeStatusOrcamento();
        $resp = $this->statusOrcamentoRepo->delete($statusOrcamento->id);
        $this->assertTrue($resp);
        $this->assertNull(StatusOrcamento::find($statusOrcamento->id), 'StatusOrcamento should not exist in DB');
    }
}

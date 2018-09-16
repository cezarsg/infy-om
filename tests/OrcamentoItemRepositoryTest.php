<?php

use App\Models\OrcamentoItem;
use App\Repositories\OrcamentoItemRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrcamentoItemRepositoryTest extends TestCase
{
    use MakeOrcamentoItemTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var OrcamentoItemRepository
     */
    protected $orcamentoItemRepo;

    public function setUp()
    {
        parent::setUp();
        $this->orcamentoItemRepo = App::make(OrcamentoItemRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateOrcamentoItem()
    {
        $orcamentoItem = $this->fakeOrcamentoItemData();
        $createdOrcamentoItem = $this->orcamentoItemRepo->create($orcamentoItem);
        $createdOrcamentoItem = $createdOrcamentoItem->toArray();
        $this->assertArrayHasKey('id', $createdOrcamentoItem);
        $this->assertNotNull($createdOrcamentoItem['id'], 'Created OrcamentoItem must have id specified');
        $this->assertNotNull(OrcamentoItem::find($createdOrcamentoItem['id']), 'OrcamentoItem with given id must be in DB');
        $this->assertModelData($orcamentoItem, $createdOrcamentoItem);
    }

    /**
     * @test read
     */
    public function testReadOrcamentoItem()
    {
        $orcamentoItem = $this->makeOrcamentoItem();
        $dbOrcamentoItem = $this->orcamentoItemRepo->find($orcamentoItem->id);
        $dbOrcamentoItem = $dbOrcamentoItem->toArray();
        $this->assertModelData($orcamentoItem->toArray(), $dbOrcamentoItem);
    }

    /**
     * @test update
     */
    public function testUpdateOrcamentoItem()
    {
        $orcamentoItem = $this->makeOrcamentoItem();
        $fakeOrcamentoItem = $this->fakeOrcamentoItemData();
        $updatedOrcamentoItem = $this->orcamentoItemRepo->update($fakeOrcamentoItem, $orcamentoItem->id);
        $this->assertModelData($fakeOrcamentoItem, $updatedOrcamentoItem->toArray());
        $dbOrcamentoItem = $this->orcamentoItemRepo->find($orcamentoItem->id);
        $this->assertModelData($fakeOrcamentoItem, $dbOrcamentoItem->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteOrcamentoItem()
    {
        $orcamentoItem = $this->makeOrcamentoItem();
        $resp = $this->orcamentoItemRepo->delete($orcamentoItem->id);
        $this->assertTrue($resp);
        $this->assertNull(OrcamentoItem::find($orcamentoItem->id), 'OrcamentoItem should not exist in DB');
    }
}

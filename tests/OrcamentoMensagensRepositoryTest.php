<?php

use App\Models\OrcamentoMensagens;
use App\Repositories\OrcamentoMensagensRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrcamentoMensagensRepositoryTest extends TestCase
{
    use MakeOrcamentoMensagensTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var OrcamentoMensagensRepository
     */
    protected $orcamentoMensagensRepo;

    public function setUp()
    {
        parent::setUp();
        $this->orcamentoMensagensRepo = App::make(OrcamentoMensagensRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateOrcamentoMensagens()
    {
        $orcamentoMensagens = $this->fakeOrcamentoMensagensData();
        $createdOrcamentoMensagens = $this->orcamentoMensagensRepo->create($orcamentoMensagens);
        $createdOrcamentoMensagens = $createdOrcamentoMensagens->toArray();
        $this->assertArrayHasKey('id', $createdOrcamentoMensagens);
        $this->assertNotNull($createdOrcamentoMensagens['id'], 'Created OrcamentoMensagens must have id specified');
        $this->assertNotNull(OrcamentoMensagens::find($createdOrcamentoMensagens['id']), 'OrcamentoMensagens with given id must be in DB');
        $this->assertModelData($orcamentoMensagens, $createdOrcamentoMensagens);
    }

    /**
     * @test read
     */
    public function testReadOrcamentoMensagens()
    {
        $orcamentoMensagens = $this->makeOrcamentoMensagens();
        $dbOrcamentoMensagens = $this->orcamentoMensagensRepo->find($orcamentoMensagens->id);
        $dbOrcamentoMensagens = $dbOrcamentoMensagens->toArray();
        $this->assertModelData($orcamentoMensagens->toArray(), $dbOrcamentoMensagens);
    }

    /**
     * @test update
     */
    public function testUpdateOrcamentoMensagens()
    {
        $orcamentoMensagens = $this->makeOrcamentoMensagens();
        $fakeOrcamentoMensagens = $this->fakeOrcamentoMensagensData();
        $updatedOrcamentoMensagens = $this->orcamentoMensagensRepo->update($fakeOrcamentoMensagens, $orcamentoMensagens->id);
        $this->assertModelData($fakeOrcamentoMensagens, $updatedOrcamentoMensagens->toArray());
        $dbOrcamentoMensagens = $this->orcamentoMensagensRepo->find($orcamentoMensagens->id);
        $this->assertModelData($fakeOrcamentoMensagens, $dbOrcamentoMensagens->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteOrcamentoMensagens()
    {
        $orcamentoMensagens = $this->makeOrcamentoMensagens();
        $resp = $this->orcamentoMensagensRepo->delete($orcamentoMensagens->id);
        $this->assertTrue($resp);
        $this->assertNull(OrcamentoMensagens::find($orcamentoMensagens->id), 'OrcamentoMensagens should not exist in DB');
    }
}

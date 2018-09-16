<?php

use App\Models\GrauServico;
use App\Repositories\GrauServicoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GrauServicoRepositoryTest extends TestCase
{
    use MakeGrauServicoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var GrauServicoRepository
     */
    protected $grauServicoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->grauServicoRepo = App::make(GrauServicoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateGrauServico()
    {
        $grauServico = $this->fakeGrauServicoData();
        $createdGrauServico = $this->grauServicoRepo->create($grauServico);
        $createdGrauServico = $createdGrauServico->toArray();
        $this->assertArrayHasKey('id', $createdGrauServico);
        $this->assertNotNull($createdGrauServico['id'], 'Created GrauServico must have id specified');
        $this->assertNotNull(GrauServico::find($createdGrauServico['id']), 'GrauServico with given id must be in DB');
        $this->assertModelData($grauServico, $createdGrauServico);
    }

    /**
     * @test read
     */
    public function testReadGrauServico()
    {
        $grauServico = $this->makeGrauServico();
        $dbGrauServico = $this->grauServicoRepo->find($grauServico->id);
        $dbGrauServico = $dbGrauServico->toArray();
        $this->assertModelData($grauServico->toArray(), $dbGrauServico);
    }

    /**
     * @test update
     */
    public function testUpdateGrauServico()
    {
        $grauServico = $this->makeGrauServico();
        $fakeGrauServico = $this->fakeGrauServicoData();
        $updatedGrauServico = $this->grauServicoRepo->update($fakeGrauServico, $grauServico->id);
        $this->assertModelData($fakeGrauServico, $updatedGrauServico->toArray());
        $dbGrauServico = $this->grauServicoRepo->find($grauServico->id);
        $this->assertModelData($fakeGrauServico, $dbGrauServico->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteGrauServico()
    {
        $grauServico = $this->makeGrauServico();
        $resp = $this->grauServicoRepo->delete($grauServico->id);
        $this->assertTrue($resp);
        $this->assertNull(GrauServico::find($grauServico->id), 'GrauServico should not exist in DB');
    }
}

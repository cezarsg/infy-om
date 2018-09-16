<?php

use App\Models\OpcaoCulinaria;
use App\Repositories\OpcaoCulinariaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OpcaoCulinariaRepositoryTest extends TestCase
{
    use MakeOpcaoCulinariaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var OpcaoCulinariaRepository
     */
    protected $opcaoCulinariaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->opcaoCulinariaRepo = App::make(OpcaoCulinariaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateOpcaoCulinaria()
    {
        $opcaoCulinaria = $this->fakeOpcaoCulinariaData();
        $createdOpcaoCulinaria = $this->opcaoCulinariaRepo->create($opcaoCulinaria);
        $createdOpcaoCulinaria = $createdOpcaoCulinaria->toArray();
        $this->assertArrayHasKey('id', $createdOpcaoCulinaria);
        $this->assertNotNull($createdOpcaoCulinaria['id'], 'Created OpcaoCulinaria must have id specified');
        $this->assertNotNull(OpcaoCulinaria::find($createdOpcaoCulinaria['id']), 'OpcaoCulinaria with given id must be in DB');
        $this->assertModelData($opcaoCulinaria, $createdOpcaoCulinaria);
    }

    /**
     * @test read
     */
    public function testReadOpcaoCulinaria()
    {
        $opcaoCulinaria = $this->makeOpcaoCulinaria();
        $dbOpcaoCulinaria = $this->opcaoCulinariaRepo->find($opcaoCulinaria->id);
        $dbOpcaoCulinaria = $dbOpcaoCulinaria->toArray();
        $this->assertModelData($opcaoCulinaria->toArray(), $dbOpcaoCulinaria);
    }

    /**
     * @test update
     */
    public function testUpdateOpcaoCulinaria()
    {
        $opcaoCulinaria = $this->makeOpcaoCulinaria();
        $fakeOpcaoCulinaria = $this->fakeOpcaoCulinariaData();
        $updatedOpcaoCulinaria = $this->opcaoCulinariaRepo->update($fakeOpcaoCulinaria, $opcaoCulinaria->id);
        $this->assertModelData($fakeOpcaoCulinaria, $updatedOpcaoCulinaria->toArray());
        $dbOpcaoCulinaria = $this->opcaoCulinariaRepo->find($opcaoCulinaria->id);
        $this->assertModelData($fakeOpcaoCulinaria, $dbOpcaoCulinaria->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteOpcaoCulinaria()
    {
        $opcaoCulinaria = $this->makeOpcaoCulinaria();
        $resp = $this->opcaoCulinariaRepo->delete($opcaoCulinaria->id);
        $this->assertTrue($resp);
        $this->assertNull(OpcaoCulinaria::find($opcaoCulinaria->id), 'OpcaoCulinaria should not exist in DB');
    }
}

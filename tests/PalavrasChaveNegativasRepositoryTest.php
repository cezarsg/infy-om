<?php

use App\Models\PalavrasChaveNegativas;
use App\Repositories\PalavrasChaveNegativasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PalavrasChaveNegativasRepositoryTest extends TestCase
{
    use MakePalavrasChaveNegativasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PalavrasChaveNegativasRepository
     */
    protected $palavrasChaveNegativasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->palavrasChaveNegativasRepo = App::make(PalavrasChaveNegativasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePalavrasChaveNegativas()
    {
        $palavrasChaveNegativas = $this->fakePalavrasChaveNegativasData();
        $createdPalavrasChaveNegativas = $this->palavrasChaveNegativasRepo->create($palavrasChaveNegativas);
        $createdPalavrasChaveNegativas = $createdPalavrasChaveNegativas->toArray();
        $this->assertArrayHasKey('id', $createdPalavrasChaveNegativas);
        $this->assertNotNull($createdPalavrasChaveNegativas['id'], 'Created PalavrasChaveNegativas must have id specified');
        $this->assertNotNull(PalavrasChaveNegativas::find($createdPalavrasChaveNegativas['id']), 'PalavrasChaveNegativas with given id must be in DB');
        $this->assertModelData($palavrasChaveNegativas, $createdPalavrasChaveNegativas);
    }

    /**
     * @test read
     */
    public function testReadPalavrasChaveNegativas()
    {
        $palavrasChaveNegativas = $this->makePalavrasChaveNegativas();
        $dbPalavrasChaveNegativas = $this->palavrasChaveNegativasRepo->find($palavrasChaveNegativas->id);
        $dbPalavrasChaveNegativas = $dbPalavrasChaveNegativas->toArray();
        $this->assertModelData($palavrasChaveNegativas->toArray(), $dbPalavrasChaveNegativas);
    }

    /**
     * @test update
     */
    public function testUpdatePalavrasChaveNegativas()
    {
        $palavrasChaveNegativas = $this->makePalavrasChaveNegativas();
        $fakePalavrasChaveNegativas = $this->fakePalavrasChaveNegativasData();
        $updatedPalavrasChaveNegativas = $this->palavrasChaveNegativasRepo->update($fakePalavrasChaveNegativas, $palavrasChaveNegativas->id);
        $this->assertModelData($fakePalavrasChaveNegativas, $updatedPalavrasChaveNegativas->toArray());
        $dbPalavrasChaveNegativas = $this->palavrasChaveNegativasRepo->find($palavrasChaveNegativas->id);
        $this->assertModelData($fakePalavrasChaveNegativas, $dbPalavrasChaveNegativas->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePalavrasChaveNegativas()
    {
        $palavrasChaveNegativas = $this->makePalavrasChaveNegativas();
        $resp = $this->palavrasChaveNegativasRepo->delete($palavrasChaveNegativas->id);
        $this->assertTrue($resp);
        $this->assertNull(PalavrasChaveNegativas::find($palavrasChaveNegativas->id), 'PalavrasChaveNegativas should not exist in DB');
    }
}

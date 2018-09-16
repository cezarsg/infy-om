<?php

use App\Models\PreferenciaSaida;
use App\Repositories\PreferenciaSaidaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PreferenciaSaidaRepositoryTest extends TestCase
{
    use MakePreferenciaSaidaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PreferenciaSaidaRepository
     */
    protected $preferenciaSaidaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->preferenciaSaidaRepo = App::make(PreferenciaSaidaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePreferenciaSaida()
    {
        $preferenciaSaida = $this->fakePreferenciaSaidaData();
        $createdPreferenciaSaida = $this->preferenciaSaidaRepo->create($preferenciaSaida);
        $createdPreferenciaSaida = $createdPreferenciaSaida->toArray();
        $this->assertArrayHasKey('id', $createdPreferenciaSaida);
        $this->assertNotNull($createdPreferenciaSaida['id'], 'Created PreferenciaSaida must have id specified');
        $this->assertNotNull(PreferenciaSaida::find($createdPreferenciaSaida['id']), 'PreferenciaSaida with given id must be in DB');
        $this->assertModelData($preferenciaSaida, $createdPreferenciaSaida);
    }

    /**
     * @test read
     */
    public function testReadPreferenciaSaida()
    {
        $preferenciaSaida = $this->makePreferenciaSaida();
        $dbPreferenciaSaida = $this->preferenciaSaidaRepo->find($preferenciaSaida->id);
        $dbPreferenciaSaida = $dbPreferenciaSaida->toArray();
        $this->assertModelData($preferenciaSaida->toArray(), $dbPreferenciaSaida);
    }

    /**
     * @test update
     */
    public function testUpdatePreferenciaSaida()
    {
        $preferenciaSaida = $this->makePreferenciaSaida();
        $fakePreferenciaSaida = $this->fakePreferenciaSaidaData();
        $updatedPreferenciaSaida = $this->preferenciaSaidaRepo->update($fakePreferenciaSaida, $preferenciaSaida->id);
        $this->assertModelData($fakePreferenciaSaida, $updatedPreferenciaSaida->toArray());
        $dbPreferenciaSaida = $this->preferenciaSaidaRepo->find($preferenciaSaida->id);
        $this->assertModelData($fakePreferenciaSaida, $dbPreferenciaSaida->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePreferenciaSaida()
    {
        $preferenciaSaida = $this->makePreferenciaSaida();
        $resp = $this->preferenciaSaidaRepo->delete($preferenciaSaida->id);
        $this->assertTrue($resp);
        $this->assertNull(PreferenciaSaida::find($preferenciaSaida->id), 'PreferenciaSaida should not exist in DB');
    }
}

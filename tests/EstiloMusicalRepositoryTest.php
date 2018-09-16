<?php

use App\Models\EstiloMusical;
use App\Repositories\EstiloMusicalRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EstiloMusicalRepositoryTest extends TestCase
{
    use MakeEstiloMusicalTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var EstiloMusicalRepository
     */
    protected $estiloMusicalRepo;

    public function setUp()
    {
        parent::setUp();
        $this->estiloMusicalRepo = App::make(EstiloMusicalRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateEstiloMusical()
    {
        $estiloMusical = $this->fakeEstiloMusicalData();
        $createdEstiloMusical = $this->estiloMusicalRepo->create($estiloMusical);
        $createdEstiloMusical = $createdEstiloMusical->toArray();
        $this->assertArrayHasKey('id', $createdEstiloMusical);
        $this->assertNotNull($createdEstiloMusical['id'], 'Created EstiloMusical must have id specified');
        $this->assertNotNull(EstiloMusical::find($createdEstiloMusical['id']), 'EstiloMusical with given id must be in DB');
        $this->assertModelData($estiloMusical, $createdEstiloMusical);
    }

    /**
     * @test read
     */
    public function testReadEstiloMusical()
    {
        $estiloMusical = $this->makeEstiloMusical();
        $dbEstiloMusical = $this->estiloMusicalRepo->find($estiloMusical->id);
        $dbEstiloMusical = $dbEstiloMusical->toArray();
        $this->assertModelData($estiloMusical->toArray(), $dbEstiloMusical);
    }

    /**
     * @test update
     */
    public function testUpdateEstiloMusical()
    {
        $estiloMusical = $this->makeEstiloMusical();
        $fakeEstiloMusical = $this->fakeEstiloMusicalData();
        $updatedEstiloMusical = $this->estiloMusicalRepo->update($fakeEstiloMusical, $estiloMusical->id);
        $this->assertModelData($fakeEstiloMusical, $updatedEstiloMusical->toArray());
        $dbEstiloMusical = $this->estiloMusicalRepo->find($estiloMusical->id);
        $this->assertModelData($fakeEstiloMusical, $dbEstiloMusical->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteEstiloMusical()
    {
        $estiloMusical = $this->makeEstiloMusical();
        $resp = $this->estiloMusicalRepo->delete($estiloMusical->id);
        $this->assertTrue($resp);
        $this->assertNull(EstiloMusical::find($estiloMusical->id), 'EstiloMusical should not exist in DB');
    }
}

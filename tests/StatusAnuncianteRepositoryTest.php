<?php

use App\Models\StatusAnunciante;
use App\Repositories\StatusAnuncianteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatusAnuncianteRepositoryTest extends TestCase
{
    use MakeStatusAnuncianteTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var StatusAnuncianteRepository
     */
    protected $statusAnuncianteRepo;

    public function setUp()
    {
        parent::setUp();
        $this->statusAnuncianteRepo = App::make(StatusAnuncianteRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateStatusAnunciante()
    {
        $statusAnunciante = $this->fakeStatusAnuncianteData();
        $createdStatusAnunciante = $this->statusAnuncianteRepo->create($statusAnunciante);
        $createdStatusAnunciante = $createdStatusAnunciante->toArray();
        $this->assertArrayHasKey('id', $createdStatusAnunciante);
        $this->assertNotNull($createdStatusAnunciante['id'], 'Created StatusAnunciante must have id specified');
        $this->assertNotNull(StatusAnunciante::find($createdStatusAnunciante['id']), 'StatusAnunciante with given id must be in DB');
        $this->assertModelData($statusAnunciante, $createdStatusAnunciante);
    }

    /**
     * @test read
     */
    public function testReadStatusAnunciante()
    {
        $statusAnunciante = $this->makeStatusAnunciante();
        $dbStatusAnunciante = $this->statusAnuncianteRepo->find($statusAnunciante->id);
        $dbStatusAnunciante = $dbStatusAnunciante->toArray();
        $this->assertModelData($statusAnunciante->toArray(), $dbStatusAnunciante);
    }

    /**
     * @test update
     */
    public function testUpdateStatusAnunciante()
    {
        $statusAnunciante = $this->makeStatusAnunciante();
        $fakeStatusAnunciante = $this->fakeStatusAnuncianteData();
        $updatedStatusAnunciante = $this->statusAnuncianteRepo->update($fakeStatusAnunciante, $statusAnunciante->id);
        $this->assertModelData($fakeStatusAnunciante, $updatedStatusAnunciante->toArray());
        $dbStatusAnunciante = $this->statusAnuncianteRepo->find($statusAnunciante->id);
        $this->assertModelData($fakeStatusAnunciante, $dbStatusAnunciante->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteStatusAnunciante()
    {
        $statusAnunciante = $this->makeStatusAnunciante();
        $resp = $this->statusAnuncianteRepo->delete($statusAnunciante->id);
        $this->assertTrue($resp);
        $this->assertNull(StatusAnunciante::find($statusAnunciante->id), 'StatusAnunciante should not exist in DB');
    }
}

<?php

use App\Models\AnuncioDiaPromocoes;
use App\Repositories\AnuncioDiaPromocoesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnuncioDiaPromocoesRepositoryTest extends TestCase
{
    use MakeAnuncioDiaPromocoesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AnuncioDiaPromocoesRepository
     */
    protected $anuncioDiaPromocoesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->anuncioDiaPromocoesRepo = App::make(AnuncioDiaPromocoesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAnuncioDiaPromocoes()
    {
        $anuncioDiaPromocoes = $this->fakeAnuncioDiaPromocoesData();
        $createdAnuncioDiaPromocoes = $this->anuncioDiaPromocoesRepo->create($anuncioDiaPromocoes);
        $createdAnuncioDiaPromocoes = $createdAnuncioDiaPromocoes->toArray();
        $this->assertArrayHasKey('id', $createdAnuncioDiaPromocoes);
        $this->assertNotNull($createdAnuncioDiaPromocoes['id'], 'Created AnuncioDiaPromocoes must have id specified');
        $this->assertNotNull(AnuncioDiaPromocoes::find($createdAnuncioDiaPromocoes['id']), 'AnuncioDiaPromocoes with given id must be in DB');
        $this->assertModelData($anuncioDiaPromocoes, $createdAnuncioDiaPromocoes);
    }

    /**
     * @test read
     */
    public function testReadAnuncioDiaPromocoes()
    {
        $anuncioDiaPromocoes = $this->makeAnuncioDiaPromocoes();
        $dbAnuncioDiaPromocoes = $this->anuncioDiaPromocoesRepo->find($anuncioDiaPromocoes->id);
        $dbAnuncioDiaPromocoes = $dbAnuncioDiaPromocoes->toArray();
        $this->assertModelData($anuncioDiaPromocoes->toArray(), $dbAnuncioDiaPromocoes);
    }

    /**
     * @test update
     */
    public function testUpdateAnuncioDiaPromocoes()
    {
        $anuncioDiaPromocoes = $this->makeAnuncioDiaPromocoes();
        $fakeAnuncioDiaPromocoes = $this->fakeAnuncioDiaPromocoesData();
        $updatedAnuncioDiaPromocoes = $this->anuncioDiaPromocoesRepo->update($fakeAnuncioDiaPromocoes, $anuncioDiaPromocoes->id);
        $this->assertModelData($fakeAnuncioDiaPromocoes, $updatedAnuncioDiaPromocoes->toArray());
        $dbAnuncioDiaPromocoes = $this->anuncioDiaPromocoesRepo->find($anuncioDiaPromocoes->id);
        $this->assertModelData($fakeAnuncioDiaPromocoes, $dbAnuncioDiaPromocoes->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAnuncioDiaPromocoes()
    {
        $anuncioDiaPromocoes = $this->makeAnuncioDiaPromocoes();
        $resp = $this->anuncioDiaPromocoesRepo->delete($anuncioDiaPromocoes->id);
        $this->assertTrue($resp);
        $this->assertNull(AnuncioDiaPromocoes::find($anuncioDiaPromocoes->id), 'AnuncioDiaPromocoes should not exist in DB');
    }
}

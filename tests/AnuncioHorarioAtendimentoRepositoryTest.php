<?php

use App\Models\AnuncioHorarioAtendimento;
use App\Repositories\AnuncioHorarioAtendimentoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AnuncioHorarioAtendimentoRepositoryTest extends TestCase
{
    use MakeAnuncioHorarioAtendimentoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AnuncioHorarioAtendimentoRepository
     */
    protected $anuncioHorarioAtendimentoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->anuncioHorarioAtendimentoRepo = App::make(AnuncioHorarioAtendimentoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAnuncioHorarioAtendimento()
    {
        $anuncioHorarioAtendimento = $this->fakeAnuncioHorarioAtendimentoData();
        $createdAnuncioHorarioAtendimento = $this->anuncioHorarioAtendimentoRepo->create($anuncioHorarioAtendimento);
        $createdAnuncioHorarioAtendimento = $createdAnuncioHorarioAtendimento->toArray();
        $this->assertArrayHasKey('id', $createdAnuncioHorarioAtendimento);
        $this->assertNotNull($createdAnuncioHorarioAtendimento['id'], 'Created AnuncioHorarioAtendimento must have id specified');
        $this->assertNotNull(AnuncioHorarioAtendimento::find($createdAnuncioHorarioAtendimento['id']), 'AnuncioHorarioAtendimento with given id must be in DB');
        $this->assertModelData($anuncioHorarioAtendimento, $createdAnuncioHorarioAtendimento);
    }

    /**
     * @test read
     */
    public function testReadAnuncioHorarioAtendimento()
    {
        $anuncioHorarioAtendimento = $this->makeAnuncioHorarioAtendimento();
        $dbAnuncioHorarioAtendimento = $this->anuncioHorarioAtendimentoRepo->find($anuncioHorarioAtendimento->id);
        $dbAnuncioHorarioAtendimento = $dbAnuncioHorarioAtendimento->toArray();
        $this->assertModelData($anuncioHorarioAtendimento->toArray(), $dbAnuncioHorarioAtendimento);
    }

    /**
     * @test update
     */
    public function testUpdateAnuncioHorarioAtendimento()
    {
        $anuncioHorarioAtendimento = $this->makeAnuncioHorarioAtendimento();
        $fakeAnuncioHorarioAtendimento = $this->fakeAnuncioHorarioAtendimentoData();
        $updatedAnuncioHorarioAtendimento = $this->anuncioHorarioAtendimentoRepo->update($fakeAnuncioHorarioAtendimento, $anuncioHorarioAtendimento->id);
        $this->assertModelData($fakeAnuncioHorarioAtendimento, $updatedAnuncioHorarioAtendimento->toArray());
        $dbAnuncioHorarioAtendimento = $this->anuncioHorarioAtendimentoRepo->find($anuncioHorarioAtendimento->id);
        $this->assertModelData($fakeAnuncioHorarioAtendimento, $dbAnuncioHorarioAtendimento->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAnuncioHorarioAtendimento()
    {
        $anuncioHorarioAtendimento = $this->makeAnuncioHorarioAtendimento();
        $resp = $this->anuncioHorarioAtendimentoRepo->delete($anuncioHorarioAtendimento->id);
        $this->assertTrue($resp);
        $this->assertNull(AnuncioHorarioAtendimento::find($anuncioHorarioAtendimento->id), 'AnuncioHorarioAtendimento should not exist in DB');
    }
}

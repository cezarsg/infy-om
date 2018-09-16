<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatusAnuncianteApiTest extends TestCase
{
    use MakeStatusAnuncianteTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateStatusAnunciante()
    {
        $statusAnunciante = $this->fakeStatusAnuncianteData();
        $this->json('POST', '/api/v1/statusAnunciantes', $statusAnunciante);

        $this->assertApiResponse($statusAnunciante);
    }

    /**
     * @test
     */
    public function testReadStatusAnunciante()
    {
        $statusAnunciante = $this->makeStatusAnunciante();
        $this->json('GET', '/api/v1/statusAnunciantes/'.$statusAnunciante->id);

        $this->assertApiResponse($statusAnunciante->toArray());
    }

    /**
     * @test
     */
    public function testUpdateStatusAnunciante()
    {
        $statusAnunciante = $this->makeStatusAnunciante();
        $editedStatusAnunciante = $this->fakeStatusAnuncianteData();

        $this->json('PUT', '/api/v1/statusAnunciantes/'.$statusAnunciante->id, $editedStatusAnunciante);

        $this->assertApiResponse($editedStatusAnunciante);
    }

    /**
     * @test
     */
    public function testDeleteStatusAnunciante()
    {
        $statusAnunciante = $this->makeStatusAnunciante();
        $this->json('DELETE', '/api/v1/statusAnunciantes/'.$statusAnunciante->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/statusAnunciantes/'.$statusAnunciante->id);

        $this->assertResponseStatus(404);
    }
}

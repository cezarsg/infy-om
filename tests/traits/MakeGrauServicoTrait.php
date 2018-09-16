<?php

use Faker\Factory as Faker;
use App\Models\GrauServico;
use App\Repositories\GrauServicoRepository;

trait MakeGrauServicoTrait
{
    /**
     * Create fake instance of GrauServico and save it in database
     *
     * @param array $grauServicoFields
     * @return GrauServico
     */
    public function makeGrauServico($grauServicoFields = [])
    {
        /** @var GrauServicoRepository $grauServicoRepo */
        $grauServicoRepo = App::make(GrauServicoRepository::class);
        $theme = $this->fakeGrauServicoData($grauServicoFields);
        return $grauServicoRepo->create($theme);
    }

    /**
     * Get fake instance of GrauServico
     *
     * @param array $grauServicoFields
     * @return GrauServico
     */
    public function fakeGrauServico($grauServicoFields = [])
    {
        return new GrauServico($this->fakeGrauServicoData($grauServicoFields));
    }

    /**
     * Get fake data of GrauServico
     *
     * @param array $postFields
     * @return array
     */
    public function fakeGrauServicoData($grauServicoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'descricao' => $fake->word,
            'nome' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $grauServicoFields);
    }
}

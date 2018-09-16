<?php

use Faker\Factory as Faker;
use App\Models\GrauEvento;
use App\Repositories\GrauEventoRepository;

trait MakeGrauEventoTrait
{
    /**
     * Create fake instance of GrauEvento and save it in database
     *
     * @param array $grauEventoFields
     * @return GrauEvento
     */
    public function makeGrauEvento($grauEventoFields = [])
    {
        /** @var GrauEventoRepository $grauEventoRepo */
        $grauEventoRepo = App::make(GrauEventoRepository::class);
        $theme = $this->fakeGrauEventoData($grauEventoFields);
        return $grauEventoRepo->create($theme);
    }

    /**
     * Get fake instance of GrauEvento
     *
     * @param array $grauEventoFields
     * @return GrauEvento
     */
    public function fakeGrauEvento($grauEventoFields = [])
    {
        return new GrauEvento($this->fakeGrauEventoData($grauEventoFields));
    }

    /**
     * Get fake data of GrauEvento
     *
     * @param array $postFields
     * @return array
     */
    public function fakeGrauEventoData($grauEventoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'descricao' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $grauEventoFields);
    }
}

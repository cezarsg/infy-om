<?php

use Faker\Factory as Faker;
use App\Models\PalavrasChave;
use App\Repositories\PalavrasChaveRepository;

trait MakePalavrasChaveTrait
{
    /**
     * Create fake instance of PalavrasChave and save it in database
     *
     * @param array $palavrasChaveFields
     * @return PalavrasChave
     */
    public function makePalavrasChave($palavrasChaveFields = [])
    {
        /** @var PalavrasChaveRepository $palavrasChaveRepo */
        $palavrasChaveRepo = App::make(PalavrasChaveRepository::class);
        $theme = $this->fakePalavrasChaveData($palavrasChaveFields);
        return $palavrasChaveRepo->create($theme);
    }

    /**
     * Get fake instance of PalavrasChave
     *
     * @param array $palavrasChaveFields
     * @return PalavrasChave
     */
    public function fakePalavrasChave($palavrasChaveFields = [])
    {
        return new PalavrasChave($this->fakePalavrasChaveData($palavrasChaveFields));
    }

    /**
     * Get fake data of PalavrasChave
     *
     * @param array $postFields
     * @return array
     */
    public function fakePalavrasChaveData($palavrasChaveFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'descricao' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $palavrasChaveFields);
    }
}

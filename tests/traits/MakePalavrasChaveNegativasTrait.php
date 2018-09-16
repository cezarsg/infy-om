<?php

use Faker\Factory as Faker;
use App\Models\PalavrasChaveNegativas;
use App\Repositories\PalavrasChaveNegativasRepository;

trait MakePalavrasChaveNegativasTrait
{
    /**
     * Create fake instance of PalavrasChaveNegativas and save it in database
     *
     * @param array $palavrasChaveNegativasFields
     * @return PalavrasChaveNegativas
     */
    public function makePalavrasChaveNegativas($palavrasChaveNegativasFields = [])
    {
        /** @var PalavrasChaveNegativasRepository $palavrasChaveNegativasRepo */
        $palavrasChaveNegativasRepo = App::make(PalavrasChaveNegativasRepository::class);
        $theme = $this->fakePalavrasChaveNegativasData($palavrasChaveNegativasFields);
        return $palavrasChaveNegativasRepo->create($theme);
    }

    /**
     * Get fake instance of PalavrasChaveNegativas
     *
     * @param array $palavrasChaveNegativasFields
     * @return PalavrasChaveNegativas
     */
    public function fakePalavrasChaveNegativas($palavrasChaveNegativasFields = [])
    {
        return new PalavrasChaveNegativas($this->fakePalavrasChaveNegativasData($palavrasChaveNegativasFields));
    }

    /**
     * Get fake data of PalavrasChaveNegativas
     *
     * @param array $postFields
     * @return array
     */
    public function fakePalavrasChaveNegativasData($palavrasChaveNegativasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'palavra' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $palavrasChaveNegativasFields);
    }
}

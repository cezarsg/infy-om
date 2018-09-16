<?php

use Faker\Factory as Faker;
use App\Models\AnuncioVideos;
use App\Repositories\AnuncioVideosRepository;

trait MakeAnuncioVideosTrait
{
    /**
     * Create fake instance of AnuncioVideos and save it in database
     *
     * @param array $anuncioVideosFields
     * @return AnuncioVideos
     */
    public function makeAnuncioVideos($anuncioVideosFields = [])
    {
        /** @var AnuncioVideosRepository $anuncioVideosRepo */
        $anuncioVideosRepo = App::make(AnuncioVideosRepository::class);
        $theme = $this->fakeAnuncioVideosData($anuncioVideosFields);
        return $anuncioVideosRepo->create($theme);
    }

    /**
     * Get fake instance of AnuncioVideos
     *
     * @param array $anuncioVideosFields
     * @return AnuncioVideos
     */
    public function fakeAnuncioVideos($anuncioVideosFields = [])
    {
        return new AnuncioVideos($this->fakeAnuncioVideosData($anuncioVideosFields));
    }

    /**
     * Get fake data of AnuncioVideos
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAnuncioVideosData($anuncioVideosFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idanuncio' => $fake->word,
            'video' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $anuncioVideosFields);
    }
}

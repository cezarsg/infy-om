<?php

use Faker\Factory as Faker;
use App\Models\PaginaEventoVideo;
use App\Repositories\PaginaEventoVideoRepository;

trait MakePaginaEventoVideoTrait
{
    /**
     * Create fake instance of PaginaEventoVideo and save it in database
     *
     * @param array $paginaEventoVideoFields
     * @return PaginaEventoVideo
     */
    public function makePaginaEventoVideo($paginaEventoVideoFields = [])
    {
        /** @var PaginaEventoVideoRepository $paginaEventoVideoRepo */
        $paginaEventoVideoRepo = App::make(PaginaEventoVideoRepository::class);
        $theme = $this->fakePaginaEventoVideoData($paginaEventoVideoFields);
        return $paginaEventoVideoRepo->create($theme);
    }

    /**
     * Get fake instance of PaginaEventoVideo
     *
     * @param array $paginaEventoVideoFields
     * @return PaginaEventoVideo
     */
    public function fakePaginaEventoVideo($paginaEventoVideoFields = [])
    {
        return new PaginaEventoVideo($this->fakePaginaEventoVideoData($paginaEventoVideoFields));
    }

    /**
     * Get fake data of PaginaEventoVideo
     *
     * @param array $postFields
     * @return array
     */
    public function fakePaginaEventoVideoData($paginaEventoVideoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idpagina' => $fake->word,
            'video' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $paginaEventoVideoFields);
    }
}

<?php

use Faker\Factory as Faker;
use App\Models\PaginaEventoPost;
use App\Repositories\PaginaEventoPostRepository;

trait MakePaginaEventoPostTrait
{
    /**
     * Create fake instance of PaginaEventoPost and save it in database
     *
     * @param array $paginaEventoPostFields
     * @return PaginaEventoPost
     */
    public function makePaginaEventoPost($paginaEventoPostFields = [])
    {
        /** @var PaginaEventoPostRepository $paginaEventoPostRepo */
        $paginaEventoPostRepo = App::make(PaginaEventoPostRepository::class);
        $theme = $this->fakePaginaEventoPostData($paginaEventoPostFields);
        return $paginaEventoPostRepo->create($theme);
    }

    /**
     * Get fake instance of PaginaEventoPost
     *
     * @param array $paginaEventoPostFields
     * @return PaginaEventoPost
     */
    public function fakePaginaEventoPost($paginaEventoPostFields = [])
    {
        return new PaginaEventoPost($this->fakePaginaEventoPostData($paginaEventoPostFields));
    }

    /**
     * Get fake data of PaginaEventoPost
     *
     * @param array $postFields
     * @return array
     */
    public function fakePaginaEventoPostData($paginaEventoPostFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idpagina' => $fake->word,
            'titulo' => $fake->word,
            'conteudo' => $fake->word,
            'dtinclusao' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $paginaEventoPostFields);
    }
}

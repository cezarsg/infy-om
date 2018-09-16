<?php

use Faker\Factory as Faker;
use App\Models\PaginaEventoFotos;
use App\Repositories\PaginaEventoFotosRepository;

trait MakePaginaEventoFotosTrait
{
    /**
     * Create fake instance of PaginaEventoFotos and save it in database
     *
     * @param array $paginaEventoFotosFields
     * @return PaginaEventoFotos
     */
    public function makePaginaEventoFotos($paginaEventoFotosFields = [])
    {
        /** @var PaginaEventoFotosRepository $paginaEventoFotosRepo */
        $paginaEventoFotosRepo = App::make(PaginaEventoFotosRepository::class);
        $theme = $this->fakePaginaEventoFotosData($paginaEventoFotosFields);
        return $paginaEventoFotosRepo->create($theme);
    }

    /**
     * Get fake instance of PaginaEventoFotos
     *
     * @param array $paginaEventoFotosFields
     * @return PaginaEventoFotos
     */
    public function fakePaginaEventoFotos($paginaEventoFotosFields = [])
    {
        return new PaginaEventoFotos($this->fakePaginaEventoFotosData($paginaEventoFotosFields));
    }

    /**
     * Get fake data of PaginaEventoFotos
     *
     * @param array $postFields
     * @return array
     */
    public function fakePaginaEventoFotosData($paginaEventoFotosFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idpagina' => $fake->word,
            'fotocaminho' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $paginaEventoFotosFields);
    }
}

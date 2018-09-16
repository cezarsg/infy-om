<?php

use Faker\Factory as Faker;
use App\Models\PaginaEventoRecado;
use App\Repositories\PaginaEventoRecadoRepository;

trait MakePaginaEventoRecadoTrait
{
    /**
     * Create fake instance of PaginaEventoRecado and save it in database
     *
     * @param array $paginaEventoRecadoFields
     * @return PaginaEventoRecado
     */
    public function makePaginaEventoRecado($paginaEventoRecadoFields = [])
    {
        /** @var PaginaEventoRecadoRepository $paginaEventoRecadoRepo */
        $paginaEventoRecadoRepo = App::make(PaginaEventoRecadoRepository::class);
        $theme = $this->fakePaginaEventoRecadoData($paginaEventoRecadoFields);
        return $paginaEventoRecadoRepo->create($theme);
    }

    /**
     * Get fake instance of PaginaEventoRecado
     *
     * @param array $paginaEventoRecadoFields
     * @return PaginaEventoRecado
     */
    public function fakePaginaEventoRecado($paginaEventoRecadoFields = [])
    {
        return new PaginaEventoRecado($this->fakePaginaEventoRecadoData($paginaEventoRecadoFields));
    }

    /**
     * Get fake data of PaginaEventoRecado
     *
     * @param array $postFields
     * @return array
     */
    public function fakePaginaEventoRecadoData($paginaEventoRecadoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idpagina' => $fake->word,
            'nome' => $fake->word,
            'mensagem' => $fake->word,
            'dtinclusao' => $fake->date('Y-m-d H:i:s'),
            'idaprovado' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $paginaEventoRecadoFields);
    }
}

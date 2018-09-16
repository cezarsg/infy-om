<?php

use Faker\Factory as Faker;
use App\Models\PaginaEvento;
use App\Repositories\PaginaEventoRepository;

trait MakePaginaEventoTrait
{
    /**
     * Create fake instance of PaginaEvento and save it in database
     *
     * @param array $paginaEventoFields
     * @return PaginaEvento
     */
    public function makePaginaEvento($paginaEventoFields = [])
    {
        /** @var PaginaEventoRepository $paginaEventoRepo */
        $paginaEventoRepo = App::make(PaginaEventoRepository::class);
        $theme = $this->fakePaginaEventoData($paginaEventoFields);
        return $paginaEventoRepo->create($theme);
    }

    /**
     * Get fake instance of PaginaEvento
     *
     * @param array $paginaEventoFields
     * @return PaginaEvento
     */
    public function fakePaginaEvento($paginaEventoFields = [])
    {
        return new PaginaEvento($this->fakePaginaEventoData($paginaEventoFields));
    }

    /**
     * Get fake data of PaginaEvento
     *
     * @param array $postFields
     * @return array
     */
    public function fakePaginaEventoData($paginaEventoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idevento' => $fake->word,
            'fotodestaquecaminho' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $paginaEventoFields);
    }
}

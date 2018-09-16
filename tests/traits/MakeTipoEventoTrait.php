<?php

use Faker\Factory as Faker;
use App\Models\TipoEvento;
use App\Repositories\TipoEventoRepository;

trait MakeTipoEventoTrait
{
    /**
     * Create fake instance of TipoEvento and save it in database
     *
     * @param array $tipoEventoFields
     * @return TipoEvento
     */
    public function makeTipoEvento($tipoEventoFields = [])
    {
        /** @var TipoEventoRepository $tipoEventoRepo */
        $tipoEventoRepo = App::make(TipoEventoRepository::class);
        $theme = $this->fakeTipoEventoData($tipoEventoFields);
        return $tipoEventoRepo->create($theme);
    }

    /**
     * Get fake instance of TipoEvento
     *
     * @param array $tipoEventoFields
     * @return TipoEvento
     */
    public function fakeTipoEvento($tipoEventoFields = [])
    {
        return new TipoEvento($this->fakeTipoEventoData($tipoEventoFields));
    }

    /**
     * Get fake data of TipoEvento
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTipoEventoData($tipoEventoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'descricao' => $fake->word,
            'ativo' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $tipoEventoFields);
    }
}

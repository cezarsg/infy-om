<?php

use Faker\Factory as Faker;
use App\Models\AnuncioHorarioAtendimento;
use App\Repositories\AnuncioHorarioAtendimentoRepository;

trait MakeAnuncioHorarioAtendimentoTrait
{
    /**
     * Create fake instance of AnuncioHorarioAtendimento and save it in database
     *
     * @param array $anuncioHorarioAtendimentoFields
     * @return AnuncioHorarioAtendimento
     */
    public function makeAnuncioHorarioAtendimento($anuncioHorarioAtendimentoFields = [])
    {
        /** @var AnuncioHorarioAtendimentoRepository $anuncioHorarioAtendimentoRepo */
        $anuncioHorarioAtendimentoRepo = App::make(AnuncioHorarioAtendimentoRepository::class);
        $theme = $this->fakeAnuncioHorarioAtendimentoData($anuncioHorarioAtendimentoFields);
        return $anuncioHorarioAtendimentoRepo->create($theme);
    }

    /**
     * Get fake instance of AnuncioHorarioAtendimento
     *
     * @param array $anuncioHorarioAtendimentoFields
     * @return AnuncioHorarioAtendimento
     */
    public function fakeAnuncioHorarioAtendimento($anuncioHorarioAtendimentoFields = [])
    {
        return new AnuncioHorarioAtendimento($this->fakeAnuncioHorarioAtendimentoData($anuncioHorarioAtendimentoFields));
    }

    /**
     * Get fake data of AnuncioHorarioAtendimento
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAnuncioHorarioAtendimentoData($anuncioHorarioAtendimentoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'idanuncio' => $fake->word,
            'diainicial' => $fake->word,
            'diafinal' => $fake->word,
            'horainicial' => $fake->word,
            'horafinal' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $anuncioHorarioAtendimentoFields);
    }
}

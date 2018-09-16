<?php

use Faker\Factory as Faker;
use App\Models\Evento;
use App\Repositories\EventoRepository;

trait MakeEventoTrait
{
    /**
     * Create fake instance of Evento and save it in database
     *
     * @param array $eventoFields
     * @return Evento
     */
    public function makeEvento($eventoFields = [])
    {
        /** @var EventoRepository $eventoRepo */
        $eventoRepo = App::make(EventoRepository::class);
        $theme = $this->fakeEventoData($eventoFields);
        return $eventoRepo->create($theme);
    }

    /**
     * Get fake instance of Evento
     *
     * @param array $eventoFields
     * @return Evento
     */
    public function fakeEvento($eventoFields = [])
    {
        return new Evento($this->fakeEventoData($eventoFields));
    }

    /**
     * Get fake data of Evento
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEventoData($eventoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome' => $fake->word,
            'idtipoevento' => $fake->word,
            'idtemaestabelecimento' => $fake->word,
            'descricao' => $fake->word,
            'eventofechado' => $fake->word,
            'dtevento' => $fake->date('Y-m-d H:i:s'),
            'horaevento' => $fake->word,
            'unicodia' => $fake->word,
            'dteventotermino' => $fake->date('Y-m-d H:i:s'),
            'nrconvidados' => $fake->randomDigitNotNull,
            'nrpessoasesperado' => $fake->randomDigitNotNull,
            'urllistapresentes' => $fake->word,
            'vlrorcamento' => $fake->word,
            'urlcompraingressos' => $fake->word,
            'faixaetariainicial' => $fake->randomDigitNotNull,
            'faixaetariafinal' => $fake->randomDigitNotNull,
            'genero' => $fake->word,
            'idgrau' => $fake->word,
            'guiadeeventos' => $fake->word,
            'dtprazomaxconfconvite' => $fake->word,
            'idconsumidor' => $fake->word,
            'idstatus' => $fake->word,
            'endereco' => $fake->word,
            'numero' => $fake->word,
            'CEP' => $fake->word,
            'complemento' => $fake->word,
            'bairro' => $fake->word,
            'cidade' => $fake->word,
            'estado' => $fake->word,
            'dtinclusao' => $fake->date('Y-m-d H:i:s'),
            'dtalteracao' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $eventoFields);
    }
}

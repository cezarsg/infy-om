<?php

namespace App\Repositories;

use App\Models\Evento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EventoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:10 am UTC
 *
 * @method Evento findWithoutFail($id, $columns = ['*'])
 * @method Evento find($id, $columns = ['*'])
 * @method Evento first($columns = ['*'])
*/
class EventoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'idtipoevento',
        'idtemaestabelecimento',
        'descricao',
        'eventofechado',
        'dtevento',
        'horaevento',
        'unicodia',
        'dteventotermino',
        'nrconvidados',
        'nrpessoasesperado',
        'urllistapresentes',
        'vlrorcamento',
        'urlcompraingressos',
        'faixaetariainicial',
        'faixaetariafinal',
        'genero',
        'idgrau',
        'guiadeeventos',
        'dtprazomaxconfconvite',
        'idconsumidor',
        'idstatus',
        'endereco',
        'numero',
        'CEP',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'dtinclusao',
        'dtalteracao'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Evento::class;
    }
}

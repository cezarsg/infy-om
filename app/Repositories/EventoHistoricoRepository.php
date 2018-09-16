<?php

namespace App\Repositories;

use App\Models\EventoHistorico;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EventoHistoricoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:10 am UTC
 *
 * @method EventoHistorico findWithoutFail($id, $columns = ['*'])
 * @method EventoHistorico find($id, $columns = ['*'])
 * @method EventoHistorico first($columns = ['*'])
*/
class EventoHistoricoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idevento',
        'dtinclusao',
        'observacao',
        'idstatus',
        'idusuario'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EventoHistorico::class;
    }
}

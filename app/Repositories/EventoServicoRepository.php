<?php

namespace App\Repositories;

use App\Models\EventoServico;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EventoServicoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:10 am UTC
 *
 * @method EventoServico findWithoutFail($id, $columns = ['*'])
 * @method EventoServico find($id, $columns = ['*'])
 * @method EventoServico first($columns = ['*'])
*/
class EventoServicoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idevento',
        'idservico'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EventoServico::class;
    }
}

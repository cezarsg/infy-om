<?php

namespace App\Repositories;

use App\Models\EventoMesas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EventoMesasRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:02 am UTC
 *
 * @method EventoMesas findWithoutFail($id, $columns = ['*'])
 * @method EventoMesas find($id, $columns = ['*'])
 * @method EventoMesas first($columns = ['*'])
*/
class EventoMesasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idconvidado',
        'nmmesa'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EventoMesas::class;
    }
}

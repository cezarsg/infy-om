<?php

namespace App\Repositories;

use App\Models\EventoPublicoAlvo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EventoPublicoAlvoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:02 am UTC
 *
 * @method EventoPublicoAlvo findWithoutFail($id, $columns = ['*'])
 * @method EventoPublicoAlvo find($id, $columns = ['*'])
 * @method EventoPublicoAlvo first($columns = ['*'])
*/
class EventoPublicoAlvoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idevento',
        'idcidade'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EventoPublicoAlvo::class;
    }
}

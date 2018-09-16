<?php

namespace App\Repositories;

use App\Models\EventoPalavrasChave;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EventoPalavrasChaveRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:02 am UTC
 *
 * @method EventoPalavrasChave findWithoutFail($id, $columns = ['*'])
 * @method EventoPalavrasChave find($id, $columns = ['*'])
 * @method EventoPalavrasChave first($columns = ['*'])
*/
class EventoPalavrasChaveRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idevento',
        'palavra'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EventoPalavrasChave::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\StatusEvento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StatusEventoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:14 am UTC
 *
 * @method StatusEvento findWithoutFail($id, $columns = ['*'])
 * @method StatusEvento find($id, $columns = ['*'])
 * @method StatusEvento first($columns = ['*'])
*/
class StatusEventoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descricao'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return StatusEvento::class;
    }
}

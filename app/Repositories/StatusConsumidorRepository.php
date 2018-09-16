<?php

namespace App\Repositories;

use App\Models\StatusConsumidor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StatusConsumidorRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:05 am UTC
 *
 * @method StatusConsumidor findWithoutFail($id, $columns = ['*'])
 * @method StatusConsumidor find($id, $columns = ['*'])
 * @method StatusConsumidor first($columns = ['*'])
*/
class StatusConsumidorRepository extends BaseRepository
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
        return StatusConsumidor::class;
    }
}

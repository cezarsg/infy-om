<?php

namespace App\Repositories;

use App\Models\Estado;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EstadoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:02 am UTC
 *
 * @method Estado findWithoutFail($id, $columns = ['*'])
 * @method Estado find($id, $columns = ['*'])
 * @method Estado first($columns = ['*'])
*/
class EstadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Estado::class;
    }
}

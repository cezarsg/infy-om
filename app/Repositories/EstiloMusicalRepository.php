<?php

namespace App\Repositories;

use App\Models\EstiloMusical;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EstiloMusicalRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:02 am UTC
 *
 * @method EstiloMusical findWithoutFail($id, $columns = ['*'])
 * @method EstiloMusical find($id, $columns = ['*'])
 * @method EstiloMusical first($columns = ['*'])
*/
class EstiloMusicalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descricao',
        'ativo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EstiloMusical::class;
    }
}

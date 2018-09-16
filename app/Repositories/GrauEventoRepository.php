<?php

namespace App\Repositories;

use App\Models\GrauEvento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class GrauEventoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:03 am UTC
 *
 * @method GrauEvento findWithoutFail($id, $columns = ['*'])
 * @method GrauEvento find($id, $columns = ['*'])
 * @method GrauEvento first($columns = ['*'])
*/
class GrauEventoRepository extends BaseRepository
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
        return GrauEvento::class;
    }
}

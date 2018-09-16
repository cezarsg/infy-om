<?php

namespace App\Repositories;

use App\Models\StatusAnunciante;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StatusAnuncianteRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:04 am UTC
 *
 * @method StatusAnunciante findWithoutFail($id, $columns = ['*'])
 * @method StatusAnunciante find($id, $columns = ['*'])
 * @method StatusAnunciante first($columns = ['*'])
*/
class StatusAnuncianteRepository extends BaseRepository
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
        return StatusAnunciante::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\PaginaEvento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PaginaEventoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:03 am UTC
 *
 * @method PaginaEvento findWithoutFail($id, $columns = ['*'])
 * @method PaginaEvento find($id, $columns = ['*'])
 * @method PaginaEvento first($columns = ['*'])
*/
class PaginaEventoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idevento',
        'fotodestaquecaminho'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PaginaEvento::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\PaginaEventoVideo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PaginaEventoVideoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:04 am UTC
 *
 * @method PaginaEventoVideo findWithoutFail($id, $columns = ['*'])
 * @method PaginaEventoVideo find($id, $columns = ['*'])
 * @method PaginaEventoVideo first($columns = ['*'])
*/
class PaginaEventoVideoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idpagina',
        'video'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PaginaEventoVideo::class;
    }
}

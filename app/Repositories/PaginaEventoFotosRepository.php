<?php

namespace App\Repositories;

use App\Models\PaginaEventoFotos;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PaginaEventoFotosRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:12 am UTC
 *
 * @method PaginaEventoFotos findWithoutFail($id, $columns = ['*'])
 * @method PaginaEventoFotos find($id, $columns = ['*'])
 * @method PaginaEventoFotos first($columns = ['*'])
*/
class PaginaEventoFotosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idpagina',
        'fotocaminho'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PaginaEventoFotos::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\AnuncioFotos;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AnuncioFotosRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:08 am UTC
 *
 * @method AnuncioFotos findWithoutFail($id, $columns = ['*'])
 * @method AnuncioFotos find($id, $columns = ['*'])
 * @method AnuncioFotos first($columns = ['*'])
*/
class AnuncioFotosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idanuncio',
        'fotocaminho'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AnuncioFotos::class;
    }
}

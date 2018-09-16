<?php

namespace App\Repositories;

use App\Models\PalavrasChaveNegativas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PalavrasChaveNegativasRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:12 am UTC
 *
 * @method PalavrasChaveNegativas findWithoutFail($id, $columns = ['*'])
 * @method PalavrasChaveNegativas find($id, $columns = ['*'])
 * @method PalavrasChaveNegativas first($columns = ['*'])
*/
class PalavrasChaveNegativasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'palavra'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PalavrasChaveNegativas::class;
    }
}

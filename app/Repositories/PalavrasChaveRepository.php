<?php

namespace App\Repositories;

use App\Models\PalavrasChave;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PalavrasChaveRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:04 am UTC
 *
 * @method PalavrasChave findWithoutFail($id, $columns = ['*'])
 * @method PalavrasChave find($id, $columns = ['*'])
 * @method PalavrasChave first($columns = ['*'])
*/
class PalavrasChaveRepository extends BaseRepository
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
        return PalavrasChave::class;
    }
}

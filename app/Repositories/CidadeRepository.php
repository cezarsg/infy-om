<?php

namespace App\Repositories;

use App\Models\Cidade;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CidadeRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:01 am UTC
 *
 * @method Cidade findWithoutFail($id, $columns = ['*'])
 * @method Cidade find($id, $columns = ['*'])
 * @method Cidade first($columns = ['*'])
*/
class CidadeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'idestado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cidade::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\OpcaoCulinaria;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OpcaoCulinariaRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:03 am UTC
 *
 * @method OpcaoCulinaria findWithoutFail($id, $columns = ['*'])
 * @method OpcaoCulinaria find($id, $columns = ['*'])
 * @method OpcaoCulinaria first($columns = ['*'])
*/
class OpcaoCulinariaRepository extends BaseRepository
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
        return OpcaoCulinaria::class;
    }
}

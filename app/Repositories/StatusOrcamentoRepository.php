<?php

namespace App\Repositories;

use App\Models\StatusOrcamento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StatusOrcamentoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:05 am UTC
 *
 * @method StatusOrcamento findWithoutFail($id, $columns = ['*'])
 * @method StatusOrcamento find($id, $columns = ['*'])
 * @method StatusOrcamento first($columns = ['*'])
*/
class StatusOrcamentoRepository extends BaseRepository
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
        return StatusOrcamento::class;
    }
}

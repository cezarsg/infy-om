<?php

namespace App\Repositories;

use App\Models\GrauServico;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class GrauServicoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:03 am UTC
 *
 * @method GrauServico findWithoutFail($id, $columns = ['*'])
 * @method GrauServico find($id, $columns = ['*'])
 * @method GrauServico first($columns = ['*'])
*/
class GrauServicoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descricao',
        'nome'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return GrauServico::class;
    }
}

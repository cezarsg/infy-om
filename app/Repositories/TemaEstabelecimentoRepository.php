<?php

namespace App\Repositories;

use App\Models\TemaEstabelecimento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TemaEstabelecimentoRepository
 * @package App\Repositories
 * @version September 15, 2018, 4:49 am UTC
 *
 * @method TemaEstabelecimento findWithoutFail($id, $columns = ['*'])
 * @method TemaEstabelecimento find($id, $columns = ['*'])
 * @method TemaEstabelecimento first($columns = ['*'])
*/
class TemaEstabelecimentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'descricao',
        'ativo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TemaEstabelecimento::class;
    }
}

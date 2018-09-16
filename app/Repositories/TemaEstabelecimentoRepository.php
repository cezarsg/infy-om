<?php

namespace App\Repositories;

use App\Models\TemaEstabelecimento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TemaEstabelecimentoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:05 am UTC
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

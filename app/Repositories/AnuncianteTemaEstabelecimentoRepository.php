<?php

namespace App\Repositories;

use App\Models\AnuncianteTemaEstabelecimento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AnuncianteTemaEstabelecimentoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:08 am UTC
 *
 * @method AnuncianteTemaEstabelecimento findWithoutFail($id, $columns = ['*'])
 * @method AnuncianteTemaEstabelecimento find($id, $columns = ['*'])
 * @method AnuncianteTemaEstabelecimento first($columns = ['*'])
*/
class AnuncianteTemaEstabelecimentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idanunciante',
        'idtemaestabelecimento'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AnuncianteTemaEstabelecimento::class;
    }
}

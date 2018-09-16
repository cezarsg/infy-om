<?php

namespace App\Repositories;

use App\Models\AnuncioTemaEstabelecimento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AnuncioTemaEstabelecimentoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:09 am UTC
 *
 * @method AnuncioTemaEstabelecimento findWithoutFail($id, $columns = ['*'])
 * @method AnuncioTemaEstabelecimento find($id, $columns = ['*'])
 * @method AnuncioTemaEstabelecimento first($columns = ['*'])
*/
class AnuncioTemaEstabelecimentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idanuncio',
        'idtemaestabelecimento'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AnuncioTemaEstabelecimento::class;
    }
}

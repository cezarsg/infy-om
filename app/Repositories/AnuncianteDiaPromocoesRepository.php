<?php

namespace App\Repositories;

use App\Models\AnuncianteDiaPromocoes;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AnuncianteDiaPromocoesRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:08 am UTC
 *
 * @method AnuncianteDiaPromocoes findWithoutFail($id, $columns = ['*'])
 * @method AnuncianteDiaPromocoes find($id, $columns = ['*'])
 * @method AnuncianteDiaPromocoes first($columns = ['*'])
*/
class AnuncianteDiaPromocoesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idanunciante',
        'datainicial',
        'datafinal',
        'descricao'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AnuncianteDiaPromocoes::class;
    }
}

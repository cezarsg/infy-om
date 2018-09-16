<?php

namespace App\Repositories;

use App\Models\AnuncioDiaPromocoes;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AnuncioDiaPromocoesRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:08 am UTC
 *
 * @method AnuncioDiaPromocoes findWithoutFail($id, $columns = ['*'])
 * @method AnuncioDiaPromocoes find($id, $columns = ['*'])
 * @method AnuncioDiaPromocoes first($columns = ['*'])
*/
class AnuncioDiaPromocoesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idanuncio',
        'nome',
        'descricao',
        'dataInicial',
        'dataFinal'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AnuncioDiaPromocoes::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\PreferenciaSaida;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PreferenciaSaidaRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:04 am UTC
 *
 * @method PreferenciaSaida findWithoutFail($id, $columns = ['*'])
 * @method PreferenciaSaida find($id, $columns = ['*'])
 * @method PreferenciaSaida first($columns = ['*'])
*/
class PreferenciaSaidaRepository extends BaseRepository
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
        return PreferenciaSaida::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\ConsumidorPalavraChave;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConsumidorPalavraChaveRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:01 am UTC
 *
 * @method ConsumidorPalavraChave findWithoutFail($id, $columns = ['*'])
 * @method ConsumidorPalavraChave find($id, $columns = ['*'])
 * @method ConsumidorPalavraChave first($columns = ['*'])
*/
class ConsumidorPalavraChaveRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idconsumidor',
        'idpalavra'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ConsumidorPalavraChave::class;
    }
}

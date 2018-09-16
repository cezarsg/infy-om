<?php

namespace App\Repositories;

use App\Models\ConsumidorHistorico;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConsumidorHistoricoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:09 am UTC
 *
 * @method ConsumidorHistorico findWithoutFail($id, $columns = ['*'])
 * @method ConsumidorHistorico find($id, $columns = ['*'])
 * @method ConsumidorHistorico first($columns = ['*'])
*/
class ConsumidorHistoricoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idconsumidor',
        'dtinclusao',
        'observacao',
        'idstatus',
        'idusuario'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ConsumidorHistorico::class;
    }
}

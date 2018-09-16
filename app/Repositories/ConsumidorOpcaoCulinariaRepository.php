<?php

namespace App\Repositories;

use App\Models\ConsumidorOpcaoCulinaria;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConsumidorOpcaoCulinariaRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:09 am UTC
 *
 * @method ConsumidorOpcaoCulinaria findWithoutFail($id, $columns = ['*'])
 * @method ConsumidorOpcaoCulinaria find($id, $columns = ['*'])
 * @method ConsumidorOpcaoCulinaria first($columns = ['*'])
*/
class ConsumidorOpcaoCulinariaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idconsumidor',
        'idopcaoculinaria'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ConsumidorOpcaoCulinaria::class;
    }
}

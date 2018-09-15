<?php

namespace App\Repositories;

use App\Models\RamoNegocio;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RamoNegocioRepository
 * @package App\Repositories
 * @version September 15, 2018, 4:33 am UTC
 *
 * @method RamoNegocio findWithoutFail($id, $columns = ['*'])
 * @method RamoNegocio find($id, $columns = ['*'])
 * @method RamoNegocio first($columns = ['*'])
*/
class RamoNegocioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descricao',
        'nome',
        'ativo',
        'exigenrconvidados'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RamoNegocio::class;
    }
}

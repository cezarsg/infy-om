<?php

namespace App\Repositories;

use App\Models\TipoEventoRamoNegocio;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TipoEventoRamoNegocioRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:05 am UTC
 *
 * @method TipoEventoRamoNegocio findWithoutFail($id, $columns = ['*'])
 * @method TipoEventoRamoNegocio find($id, $columns = ['*'])
 * @method TipoEventoRamoNegocio first($columns = ['*'])
*/
class TipoEventoRamoNegocioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idtipoevento',
        'idramonegocio',
        'idgrauservico'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TipoEventoRamoNegocio::class;
    }
}

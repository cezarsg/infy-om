<?php

namespace App\Repositories;

use App\Models\Anunciantehistorico;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AnunciantehistoricoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:08 am UTC
 *
 * @method Anunciantehistorico findWithoutFail($id, $columns = ['*'])
 * @method Anunciantehistorico find($id, $columns = ['*'])
 * @method Anunciantehistorico first($columns = ['*'])
*/
class AnunciantehistoricoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idanunciante',
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
        return Anunciantehistorico::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\TipoEvento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TipoEventoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:05 am UTC
 *
 * @method TipoEvento findWithoutFail($id, $columns = ['*'])
 * @method TipoEvento find($id, $columns = ['*'])
 * @method TipoEvento first($columns = ['*'])
*/
class TipoEventoRepository extends BaseRepository
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
        return TipoEvento::class;
    }
}

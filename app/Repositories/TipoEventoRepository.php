<?php

namespace App\Repositories;

use App\Models\TipoEvento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TipoEventoRepository
 * @package App\Repositories
 * @version September 15, 2018, 4:02 am UTC
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

<?php

namespace App\Repositories;

use App\Models\AnuncianteTipoEvento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AnuncianteTipoEventoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:08 am UTC
 *
 * @method AnuncianteTipoEvento findWithoutFail($id, $columns = ['*'])
 * @method AnuncianteTipoEvento find($id, $columns = ['*'])
 * @method AnuncianteTipoEvento first($columns = ['*'])
*/
class AnuncianteTipoEventoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idanunciante',
        'idtipoevento',
        'precomediocobrado',
        'precomediocobradoportipo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AnuncianteTipoEvento::class;
    }
}

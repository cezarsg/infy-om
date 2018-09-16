<?php

namespace App\Repositories;

use App\Models\AnuncioPrecoMedioEvento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AnuncioPrecoMedioEventoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:09 am UTC
 *
 * @method AnuncioPrecoMedioEvento findWithoutFail($id, $columns = ['*'])
 * @method AnuncioPrecoMedioEvento find($id, $columns = ['*'])
 * @method AnuncioPrecoMedioEvento first($columns = ['*'])
*/
class AnuncioPrecoMedioEventoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idanuncio',
        'idtipoevento',
        'precoMedioCobrado',
        'precoMedioCobradoPorTipo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AnuncioPrecoMedioEvento::class;
    }
}

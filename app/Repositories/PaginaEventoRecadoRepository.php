<?php

namespace App\Repositories;

use App\Models\PaginaEventoRecado;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PaginaEventoRecadoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:12 am UTC
 *
 * @method PaginaEventoRecado findWithoutFail($id, $columns = ['*'])
 * @method PaginaEventoRecado find($id, $columns = ['*'])
 * @method PaginaEventoRecado first($columns = ['*'])
*/
class PaginaEventoRecadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idpagina',
        'nome',
        'mensagem',
        'dtinclusao',
        'idaprovado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PaginaEventoRecado::class;
    }
}

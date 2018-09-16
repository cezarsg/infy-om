<?php

namespace App\Repositories;

use App\Models\PaginaEventoPost;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PaginaEventoPostRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:04 am UTC
 *
 * @method PaginaEventoPost findWithoutFail($id, $columns = ['*'])
 * @method PaginaEventoPost find($id, $columns = ['*'])
 * @method PaginaEventoPost first($columns = ['*'])
*/
class PaginaEventoPostRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idpagina',
        'titulo',
        'conteudo',
        'dtinclusao'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PaginaEventoPost::class;
    }
}

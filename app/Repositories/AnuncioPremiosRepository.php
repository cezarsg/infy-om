<?php

namespace App\Repositories;

use App\Models\AnuncioPremios;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AnuncioPremiosRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:01 am UTC
 *
 * @method AnuncioPremios findWithoutFail($id, $columns = ['*'])
 * @method AnuncioPremios find($id, $columns = ['*'])
 * @method AnuncioPremios first($columns = ['*'])
*/
class AnuncioPremiosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idanuncio',
        'fotopremiocaminho',
        'descricao'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AnuncioPremios::class;
    }
}

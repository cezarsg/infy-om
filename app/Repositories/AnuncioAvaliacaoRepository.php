<?php

namespace App\Repositories;

use App\Models\AnuncioAvaliacao;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AnuncioAvaliacaoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:00 am UTC
 *
 * @method AnuncioAvaliacao findWithoutFail($id, $columns = ['*'])
 * @method AnuncioAvaliacao find($id, $columns = ['*'])
 * @method AnuncioAvaliacao first($columns = ['*'])
*/
class AnuncioAvaliacaoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idanuncio',
        'nrestrelas',
        'observacao',
        'idusuario',
        'dtinclusao'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AnuncioAvaliacao::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\AnuncioAbrangenciaAtuacao;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AnuncioAbrangenciaAtuacaoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:00 am UTC
 *
 * @method AnuncioAbrangenciaAtuacao findWithoutFail($id, $columns = ['*'])
 * @method AnuncioAbrangenciaAtuacao find($id, $columns = ['*'])
 * @method AnuncioAbrangenciaAtuacao first($columns = ['*'])
*/
class AnuncioAbrangenciaAtuacaoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idanuncio',
        'abrangencia',
        'idestado',
        'idcidade'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AnuncioAbrangenciaAtuacao::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\OrcamentoAvulso;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrcamentoAvulsoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:11 am UTC
 *
 * @method OrcamentoAvulso findWithoutFail($id, $columns = ['*'])
 * @method OrcamentoAvulso find($id, $columns = ['*'])
 * @method OrcamentoAvulso first($columns = ['*'])
*/
class OrcamentoAvulsoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idanuncio',
        'nome',
        'email',
        'telefone',
        'dtevento',
        'localizacao',
        'dsevento',
        'dtinclusao',
        'ativo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return OrcamentoAvulso::class;
    }
}

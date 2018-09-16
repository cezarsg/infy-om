<?php

namespace App\Repositories;

use App\Models\OrcamentoMensagens;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrcamentoMensagensRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:03 am UTC
 *
 * @method OrcamentoMensagens findWithoutFail($id, $columns = ['*'])
 * @method OrcamentoMensagens find($id, $columns = ['*'])
 * @method OrcamentoMensagens first($columns = ['*'])
*/
class OrcamentoMensagensRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idorcamento',
        'tipomensagem',
        'idPergunta',
        'dtinclusao',
        'mensagem',
        'incluidapor'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return OrcamentoMensagens::class;
    }
}

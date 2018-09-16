<?php

namespace App\Repositories;

use App\Models\OrcamentoItem;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrcamentoItemRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:11 am UTC
 *
 * @method OrcamentoItem findWithoutFail($id, $columns = ['*'])
 * @method OrcamentoItem find($id, $columns = ['*'])
 * @method OrcamentoItem first($columns = ['*'])
*/
class OrcamentoItemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idorcamento',
        'descricao',
        'quantidade',
        'vlrunitario'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return OrcamentoItem::class;
    }
}

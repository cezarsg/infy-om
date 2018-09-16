<?php

namespace App\Repositories;

use App\Models\Orcamento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrcamentoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:03 am UTC
 *
 * @method Orcamento findWithoutFail($id, $columns = ['*'])
 * @method Orcamento find($id, $columns = ['*'])
 * @method Orcamento first($columns = ['*'])
*/
class OrcamentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descricaoservico',
        'idservico',
        'idstatus',
        'idevento',
        'idanuncio',
        'dtvalidade',
        'dtinclusao',
        'dtresposta',
        'dtalteracao'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Orcamento::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\AnuncioHorarioAtendimento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AnuncioHorarioAtendimentoRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:08 am UTC
 *
 * @method AnuncioHorarioAtendimento findWithoutFail($id, $columns = ['*'])
 * @method AnuncioHorarioAtendimento find($id, $columns = ['*'])
 * @method AnuncioHorarioAtendimento first($columns = ['*'])
*/
class AnuncioHorarioAtendimentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idanuncio',
        'diainicial',
        'diafinal',
        'horainicial',
        'horafinal'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AnuncioHorarioAtendimento::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\Consumidor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConsumidorRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:06 am UTC
 *
 * @method Consumidor findWithoutFail($id, $columns = ['*'])
 * @method Consumidor find($id, $columns = ['*'])
 * @method Consumidor first($columns = ['*'])
*/
class ConsumidorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'sobrenome',
        'sexo',
        'dtnascimento',
        'idcidade',
        'fotodestaquecaminho',
        'dtinclusao',
        'dtalteracao',
        'idusuario',
        'ativo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Consumidor::class;
    }
}

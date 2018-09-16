<?php

namespace App\Repositories;

use App\Models\Anunciante;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AnuncianteRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:07 am UTC
 *
 * @method Anunciante findWithoutFail($id, $columns = ['*'])
 * @method Anunciante find($id, $columns = ['*'])
 * @method Anunciante first($columns = ['*'])
*/
class AnuncianteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'razaosocial',
        'nomefantasia',
        'CNPJ',
        'CPF',
        'telefone',
        'endereco',
        'numero',
        'CEP',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'facebook',
        'linkedin',
        'instagram',
        'twitter',
        'pinterest',
        'idusuarioanunciante',
        'dtinclusao',
        'dtalteracao',
        'ativo',
        'aprovado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Anunciante::class;
    }
}

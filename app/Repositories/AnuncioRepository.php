<?php

namespace App\Repositories;

use App\Models\Anuncio;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AnuncioRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:08 am UTC
 *
 * @method Anuncio findWithoutFail($id, $columns = ['*'])
 * @method Anuncio find($id, $columns = ['*'])
 * @method Anuncio first($columns = ['*'])
*/
class AnuncioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idanunciante',
        'dtinclusao',
        'dtalteracao',
        'idstatus',
        'idramonegocio',
        'estabelecimentoproprio',
        'qtdemaximapessoasporevento',
        'informacoesimportantes',
        'fotodestaquecaminho',
        'score',
        'idusuario'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Anuncio::class;
    }
}

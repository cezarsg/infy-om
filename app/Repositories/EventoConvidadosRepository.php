<?php

namespace App\Repositories;

use App\Models\EventoConvidados;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EventoConvidadosRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:02 am UTC
 *
 * @method EventoConvidados findWithoutFail($id, $columns = ['*'])
 * @method EventoConvidados find($id, $columns = ['*'])
 * @method EventoConvidados first($columns = ['*'])
*/
class EventoConvidadosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idevento',
        'nome',
        'email',
        'apelido',
        'confirmado',
        'emailenviado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EventoConvidados::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\EventoConvite;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EventoConviteRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:02 am UTC
 *
 * @method EventoConvite findWithoutFail($id, $columns = ['*'])
 * @method EventoConvite find($id, $columns = ['*'])
 * @method EventoConvite first($columns = ['*'])
*/
class EventoConviteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'quemconvida',
        'titulo',
        'mensagem',
        'fotocaminho',
        'idevento'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EventoConvite::class;
    }
}

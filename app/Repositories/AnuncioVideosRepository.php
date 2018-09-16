<?php

namespace App\Repositories;

use App\Models\AnuncioVideos;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AnuncioVideosRepository
 * @package App\Repositories
 * @version September 16, 2018, 12:01 am UTC
 *
 * @method AnuncioVideos findWithoutFail($id, $columns = ['*'])
 * @method AnuncioVideos find($id, $columns = ['*'])
 * @method AnuncioVideos first($columns = ['*'])
*/
class AnuncioVideosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idanuncio',
        'video'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AnuncioVideos::class;
    }
}

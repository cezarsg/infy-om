<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TemaEstabelecimento
 * @package App\Models
 * @version September 15, 2018, 4:49 am UTC
 *
 * @property string descricao
 * @property numeric ativo
 */
class TemaEstabelecimento extends Model
{
    use SoftDeletes;

    public $table = 'temaestabelecimento';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'descricao',
        'ativo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'descricao' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'descricao' => 'required'
    ];

    
}

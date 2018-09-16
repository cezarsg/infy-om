<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PalavrasChaveNegativas
 * @package App\Models
 * @version September 16, 2018, 12:04 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection anuncianteramonegocio
 * @property \Illuminate\Database\Eloquent\Collection anunciantetemaestabelecimento
 * @property \Illuminate\Database\Eloquent\Collection anunciantetipoevento
 * @property \Illuminate\Database\Eloquent\Collection anuncioavaliacao
 * @property \Illuminate\Database\Eloquent\Collection anuncioprecomedioevento
 * @property \Illuminate\Database\Eloquent\Collection anunciotemaestabelecimento
 * @property \Illuminate\Database\Eloquent\Collection consumidoropcaoculinaria
 * @property \Illuminate\Database\Eloquent\Collection consumidorpalavrachave
 * @property \Illuminate\Database\Eloquent\Collection eventopublicoalvo
 * @property \Illuminate\Database\Eloquent\Collection eventoservico
 * @property \Illuminate\Database\Eloquent\Collection orcamentomensagens
 * @property string palavra
 */
class PalavrasChaveNegativas extends Model
{
    use SoftDeletes;

    public $table = 'palavraschavenegativas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'palavra'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'palavra' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AnuncioPrecoMedioEvento
 * @package App\Models
 * @version September 16, 2018, 12:00 am UTC
 *
 * @property \App\Models\Anuncio anuncio
 * @property \App\Models\Tipoevento tipoevento
 * @property \Illuminate\Database\Eloquent\Collection anuncianteramonegocio
 * @property \Illuminate\Database\Eloquent\Collection anunciantetemaestabelecimento
 * @property \Illuminate\Database\Eloquent\Collection anunciantetipoevento
 * @property \Illuminate\Database\Eloquent\Collection anuncioavaliacao
 * @property \Illuminate\Database\Eloquent\Collection anunciotemaestabelecimento
 * @property \Illuminate\Database\Eloquent\Collection consumidoropcaoculinaria
 * @property \Illuminate\Database\Eloquent\Collection consumidorpalavrachave
 * @property \Illuminate\Database\Eloquent\Collection eventopublicoalvo
 * @property \Illuminate\Database\Eloquent\Collection eventoservico
 * @property \Illuminate\Database\Eloquent\Collection orcamentomensagens
 * @property bigInteger idanuncio
 * @property bigInteger idtipoevento
 * @property decimal precoMedioCobrado
 * @property string precoMedioCobradoPorTipo
 */
class AnuncioPrecoMedioEvento extends Model
{
    use SoftDeletes;

    public $table = 'anuncioprecomedioevento';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'idanuncio',
        'idtipoevento',
        'precoMedioCobrado',
        'precoMedioCobradoPorTipo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'precoMedioCobradoPorTipo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function anuncio()
    {
        return $this->belongsTo(\App\Models\Anuncio::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoevento()
    {
        return $this->belongsTo(\App\Models\Tipoevento::class);
    }
}

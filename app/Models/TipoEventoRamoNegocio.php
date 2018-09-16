<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TipoEventoRamoNegocio
 * @package App\Models
 * @version September 16, 2018, 12:05 am UTC
 *
 * @property \App\Models\Tipoevento tipoevento
 * @property \App\Models\Ramonegocio ramonegocio
 * @property \App\Models\Grauservico grauservico
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
 * @property bigInteger idtipoevento
 * @property bigInteger idramonegocio
 * @property bigInteger idgrauservico
 */
class TipoEventoRamoNegocio extends Model
{
    use SoftDeletes;

    public $table = 'tipoeventoramonegocio';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'idtipoevento',
        'idramonegocio',
        'idgrauservico'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
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
    public function tipoevento()
    {
        return $this->belongsTo(\App\Models\Tipoevento::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ramonegocio()
    {
        return $this->belongsTo(\App\Models\Ramonegocio::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function grauservico()
    {
        return $this->belongsTo(\App\Models\Grauservico::class);
    }
}

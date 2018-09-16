<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ConsumidorHistorico
 * @package App\Models
 * @version September 16, 2018, 12:01 am UTC
 *
 * @property \App\Models\Consumidor consumidor
 * @property \App\Models\Usuario usuario
 * @property \App\Models\Statusconsumidor statusconsumidor
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
 * @property bigInteger idconsumidor
 * @property string|\Carbon\Carbon dtinclusao
 * @property string observacao
 * @property bigInteger idstatus
 * @property bigInteger idusuario
 */
class ConsumidorHistorico extends Model
{
    use SoftDeletes;

    public $table = 'consumidorhistorico';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'idconsumidor',
        'dtinclusao',
        'observacao',
        'idstatus',
        'idusuario'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'observacao' => 'string'
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
    public function consumidor()
    {
        return $this->belongsTo(\App\Models\Consumidor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function usuario()
    {
        return $this->belongsTo(\App\Models\Usuario::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function statusconsumidor()
    {
        return $this->belongsTo(\App\Models\Statusconsumidor::class);
    }
}

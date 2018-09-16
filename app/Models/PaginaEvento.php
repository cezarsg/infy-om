<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PaginaEvento
 * @package App\Models
 * @version September 16, 2018, 12:12 am UTC
 *
 * @property \App\Models\Evento evento
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
 * @property \Illuminate\Database\Eloquent\Collection Paginaeventofoto
 * @property \Illuminate\Database\Eloquent\Collection Paginaeventopost
 * @property \Illuminate\Database\Eloquent\Collection Paginaeventorecado
 * @property \Illuminate\Database\Eloquent\Collection Paginaeventovideo
 * @property bigInteger idevento
 * @property string fotodestaquecaminho
 */
class PaginaEvento extends Model
{
    use SoftDeletes;

    public $table = 'paginaevento';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'idevento',
        'fotodestaquecaminho'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fotodestaquecaminho' => 'string'
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
    public function evento()
    {
        return $this->belongsTo(\App\Models\Evento::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function paginaeventofotos()
    {
        return $this->hasMany(\App\Models\Paginaeventofoto::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function paginaeventoposts()
    {
        return $this->hasMany(\App\Models\Paginaeventopost::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function paginaeventorecados()
    {
        return $this->hasMany(\App\Models\Paginaeventorecado::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function paginaeventovideos()
    {
        return $this->hasMany(\App\Models\Paginaeventovideo::class);
    }
}

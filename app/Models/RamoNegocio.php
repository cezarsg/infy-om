<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RamoNegocio
 * @package App\Models
 * @version September 16, 2018, 12:14 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection anuncianteramonegocio
 * @property \Illuminate\Database\Eloquent\Collection anunciantetemaestabelecimento
 * @property \Illuminate\Database\Eloquent\Collection anunciantetipoevento
 * @property \Illuminate\Database\Eloquent\Collection Anuncio
 * @property \Illuminate\Database\Eloquent\Collection anuncioavaliacao
 * @property \Illuminate\Database\Eloquent\Collection anuncioprecomedioevento
 * @property \Illuminate\Database\Eloquent\Collection anunciotemaestabelecimento
 * @property \Illuminate\Database\Eloquent\Collection consumidoropcaoculinaria
 * @property \Illuminate\Database\Eloquent\Collection consumidorpalavrachave
 * @property \Illuminate\Database\Eloquent\Collection eventopublicoalvo
 * @property \Illuminate\Database\Eloquent\Collection eventoservico
 * @property \Illuminate\Database\Eloquent\Collection Orcamento
 * @property \Illuminate\Database\Eloquent\Collection orcamentomensagens
 * @property \Illuminate\Database\Eloquent\Collection Tipoeventoramonegocio
 * @property string descricao
 * @property string nome
 * @property boolean ativo
 * @property boolean exigenrconvidados
 */
class RamoNegocio extends Model
{
    use SoftDeletes;

    public $table = 'ramonegocio';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'descricao',
        'nome',
        'ativo',
        'exigenrconvidados'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'descricao' => 'string',
        'nome' => 'string',
        'ativo' => 'boolean',
        'exigenrconvidados' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function anuncios()
    {
        return $this->belongsToMany(\App\Models\Anuncio::class, 'anuncianteramonegocio');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function anuncios()
    {
        return $this->hasMany(\App\Models\Anuncio::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function eventos()
    {
        return $this->belongsToMany(\App\Models\Evento::class, 'eventoservico');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orcamentos()
    {
        return $this->hasMany(\App\Models\Orcamento::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tipoeventoramonegocios()
    {
        return $this->hasMany(\App\Models\Tipoeventoramonegocio::class);
    }
}

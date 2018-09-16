<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class GrauServico
 * @package App\Models
 * @version September 16, 2018, 12:03 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection anuncianteramonegocio
 * @property \Illuminate\Database\Eloquent\Collection anunciantetemaestabelecimento
 * @property \Illuminate\Database\Eloquent\Collection anunciantetipoevento
 * @property \Illuminate\Database\Eloquent\Collection anuncioavaliacao
 * @property \Illuminate\Database\Eloquent\Collection anuncioprecomedioevento
 * @property \Illuminate\Database\Eloquent\Collection anunciotemaestabelecimento
 * @property \Illuminate\Database\Eloquent\Collection consumidoropcaoculinaria
 * @property \Illuminate\Database\Eloquent\Collection consumidorpalavrachave
 * @property \Illuminate\Database\Eloquent\Collection Evento
 * @property \Illuminate\Database\Eloquent\Collection eventopublicoalvo
 * @property \Illuminate\Database\Eloquent\Collection eventoservico
 * @property \Illuminate\Database\Eloquent\Collection orcamentomensagens
 * @property \Illuminate\Database\Eloquent\Collection Tipoeventoramonegocio
 * @property string descricao
 * @property string nome
 */
class GrauServico extends Model
{
    use SoftDeletes;

    public $table = 'grauservico';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'descricao',
        'nome'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'descricao' => 'string',
        'nome' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function eventos()
    {
        return $this->hasMany(\App\Models\Evento::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tipoeventoramonegocios()
    {
        return $this->hasMany(\App\Models\Tipoeventoramonegocio::class);
    }
}

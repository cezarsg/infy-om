<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Consumidor
 * @package App\Models
 * @version September 16, 2018, 12:06 am UTC
 *
 * @property \App\Models\Usuario usuario
 * @property \Illuminate\Database\Eloquent\Collection anuncianteramonegocio
 * @property \Illuminate\Database\Eloquent\Collection anunciantetemaestabelecimento
 * @property \Illuminate\Database\Eloquent\Collection anunciantetipoevento
 * @property \Illuminate\Database\Eloquent\Collection anuncioavaliacao
 * @property \Illuminate\Database\Eloquent\Collection anuncioprecomedioevento
 * @property \Illuminate\Database\Eloquent\Collection anunciotemaestabelecimento
 * @property \Illuminate\Database\Eloquent\Collection Consumidorhistorico
 * @property \Illuminate\Database\Eloquent\Collection consumidoropcaoculinaria
 * @property \Illuminate\Database\Eloquent\Collection consumidorpalavrachave
 * @property \Illuminate\Database\Eloquent\Collection Evento
 * @property \Illuminate\Database\Eloquent\Collection eventopublicoalvo
 * @property \Illuminate\Database\Eloquent\Collection eventoservico
 * @property \Illuminate\Database\Eloquent\Collection orcamentomensagens
 * @property string nome
 * @property string sobrenome
 * @property string sexo
 * @property date dtnascimento
 * @property bigInteger idcidade
 * @property string fotodestaquecaminho
 * @property string|\Carbon\Carbon dtinclusao
 * @property string|\Carbon\Carbon dtalteracao
 * @property bigInteger idusuario
 * @property boolean ativo
 */
class Consumidor extends Model
{
    use SoftDeletes;

    public $table = 'consumidor';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome',
        'sobrenome',
        'sexo',
        'dtnascimento',
        'idcidade',
        'fotodestaquecaminho',
        'dtinclusao',
        'dtalteracao',
        'idusuario',
        'ativo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome' => 'string',
        'sobrenome' => 'string',
        'sexo' => 'string',
        'dtnascimento' => 'date',
        'fotodestaquecaminho' => 'string',
        'ativo' => 'boolean'
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
    public function usuario()
    {
        return $this->belongsTo(\App\Models\Usuario::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function consumidorhistoricos()
    {
        return $this->hasMany(\App\Models\Consumidorhistorico::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function opcaoculinaria()
    {
        return $this->belongsToMany(\App\Models\Opcaoculinarium::class, 'consumidoropcaoculinaria');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function palavraschaves()
    {
        return $this->belongsToMany(\App\Models\Palavraschave::class, 'consumidorpalavrachave');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function eventos()
    {
        return $this->hasMany(\App\Models\Evento::class);
    }
}

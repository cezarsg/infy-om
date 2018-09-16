<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Anunciante
 * @package App\Models
 * @version September 16, 2018, 12:07 am UTC
 *
 * @property \App\Models\Usuario usuario
 * @property \Illuminate\Database\Eloquent\Collection Anunciantehistorico
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
 * @property \Illuminate\Database\Eloquent\Collection orcamentomensagens
 * @property string razaosocial
 * @property string nomefantasia
 * @property string CNPJ
 * @property string CPF
 * @property string telefone
 * @property string endereco
 * @property string numero
 * @property string CEP
 * @property string complemento
 * @property string bairro
 * @property string cidade
 * @property string estado
 * @property string facebook
 * @property string linkedin
 * @property string instagram
 * @property string twitter
 * @property string pinterest
 * @property bigInteger idusuarioanunciante
 * @property string|\Carbon\Carbon dtinclusao
 * @property string|\Carbon\Carbon dtalteracao
 * @property boolean ativo
 * @property boolean aprovado
 */
class Anunciante extends Model
{
    use SoftDeletes;

    public $table = 'anunciante';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'razaosocial',
        'nomefantasia',
        'CNPJ',
        'CPF',
        'telefone',
        'endereco',
        'numero',
        'CEP',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'facebook',
        'linkedin',
        'instagram',
        'twitter',
        'pinterest',
        'idusuarioanunciante',
        'dtinclusao',
        'dtalteracao',
        'ativo',
        'aprovado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'razaosocial' => 'string',
        'nomefantasia' => 'string',
        'CNPJ' => 'string',
        'CPF' => 'string',
        'telefone' => 'string',
        'endereco' => 'string',
        'numero' => 'string',
        'CEP' => 'string',
        'complemento' => 'string',
        'bairro' => 'string',
        'cidade' => 'string',
        'estado' => 'string',
        'facebook' => 'string',
        'linkedin' => 'string',
        'instagram' => 'string',
        'twitter' => 'string',
        'pinterest' => 'string',
        'ativo' => 'boolean',
        'aprovado' => 'boolean'
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
    public function anunciantehistoricos()
    {
        return $this->hasMany(\App\Models\Anunciantehistorico::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function anuncios()
    {
        return $this->hasMany(\App\Models\Anuncio::class);
    }
}

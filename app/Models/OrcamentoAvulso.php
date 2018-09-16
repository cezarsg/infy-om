<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrcamentoAvulso
 * @package App\Models
 * @version September 16, 2018, 12:11 am UTC
 *
 * @property \App\Models\Anuncio anuncio
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
 * @property bigInteger idanuncio
 * @property string nome
 * @property string email
 * @property string telefone
 * @property date dtevento
 * @property string localizacao
 * @property string dsevento
 * @property string|\Carbon\Carbon dtinclusao
 * @property boolean ativo
 */
class OrcamentoAvulso extends Model
{
    use SoftDeletes;

    public $table = 'orcamentoavulso';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'idanuncio',
        'nome',
        'email',
        'telefone',
        'dtevento',
        'localizacao',
        'dsevento',
        'dtinclusao',
        'ativo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome' => 'string',
        'email' => 'string',
        'telefone' => 'string',
        'dtevento' => 'date',
        'localizacao' => 'string',
        'dsevento' => 'string',
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
    public function anuncio()
    {
        return $this->belongsTo(\App\Models\Anuncio::class);
    }
}

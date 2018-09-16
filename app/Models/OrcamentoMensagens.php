<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrcamentoMensagens
 * @package App\Models
 * @version September 16, 2018, 12:03 am UTC
 *
 * @property \App\Models\Orcamento orcamento
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
 * @property bigInteger idorcamento
 * @property string tipomensagem
 * @property bigInteger idPergunta
 * @property string|\Carbon\Carbon dtinclusao
 * @property string mensagem
 * @property string incluidapor
 */
class OrcamentoMensagens extends Model
{
    use SoftDeletes;

    public $table = 'orcamentomensagens';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'idorcamento',
        'tipomensagem',
        'idPergunta',
        'dtinclusao',
        'mensagem',
        'incluidapor'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tipomensagem' => 'string',
        'mensagem' => 'string',
        'incluidapor' => 'string'
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
    public function orcamento()
    {
        return $this->belongsTo(\App\Models\Orcamento::class);
    }
}

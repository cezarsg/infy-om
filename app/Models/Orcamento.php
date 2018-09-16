<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Orcamento
 * @package App\Models
 * @version September 16, 2018, 12:03 am UTC
 *
 * @property \App\Models\Evento evento
 * @property \App\Models\Ramonegocio ramonegocio
 * @property \App\Models\Anuncio anuncio
 * @property \App\Models\Statusorcamento statusorcamento
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
 * @property \Illuminate\Database\Eloquent\Collection Orcamentoitem
 * @property \Illuminate\Database\Eloquent\Collection Orcamentomensagen
 * @property string descricaoservico
 * @property bigInteger idservico
 * @property bigInteger idstatus
 * @property bigInteger idevento
 * @property bigInteger idanuncio
 * @property date dtvalidade
 * @property string|\Carbon\Carbon dtinclusao
 * @property string|\Carbon\Carbon dtresposta
 * @property string|\Carbon\Carbon dtalteracao
 */
class Orcamento extends Model
{
    use SoftDeletes;

    public $table = 'orcamento';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'descricaoservico',
        'idservico',
        'idstatus',
        'idevento',
        'idanuncio',
        'dtvalidade',
        'dtinclusao',
        'dtresposta',
        'dtalteracao'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'descricaoservico' => 'string',
        'dtvalidade' => 'date'
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ramonegocio()
    {
        return $this->belongsTo(\App\Models\Ramonegocio::class);
    }

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
    public function statusorcamento()
    {
        return $this->belongsTo(\App\Models\Statusorcamento::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orcamentoitems()
    {
        return $this->hasMany(\App\Models\Orcamentoitem::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orcamentomensagens()
    {
        return $this->hasMany(\App\Models\Orcamentomensagen::class);
    }
}

<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Evento
 * @package App\Models
 * @version September 16, 2018, 12:02 am UTC
 *
 * @property \App\Models\Consumidor consumidor
 * @property \App\Models\Tipoevento tipoevento
 * @property \App\Models\Temaestabelecimento temaestabelecimento
 * @property \App\Models\Grauservico grauservico
 * @property \Illuminate\Database\Eloquent\Collection anuncianteramonegocio
 * @property \Illuminate\Database\Eloquent\Collection anunciantetemaestabelecimento
 * @property \Illuminate\Database\Eloquent\Collection anunciantetipoevento
 * @property \Illuminate\Database\Eloquent\Collection anuncioavaliacao
 * @property \Illuminate\Database\Eloquent\Collection anuncioprecomedioevento
 * @property \Illuminate\Database\Eloquent\Collection anunciotemaestabelecimento
 * @property \Illuminate\Database\Eloquent\Collection consumidoropcaoculinaria
 * @property \Illuminate\Database\Eloquent\Collection consumidorpalavrachave
 * @property \Illuminate\Database\Eloquent\Collection Eventoconvidado
 * @property \Illuminate\Database\Eloquent\Collection Eventoconvite
 * @property \Illuminate\Database\Eloquent\Collection Eventohistorico
 * @property \Illuminate\Database\Eloquent\Collection Eventopalavraschave
 * @property \Illuminate\Database\Eloquent\Collection eventopublicoalvo
 * @property \Illuminate\Database\Eloquent\Collection eventoservico
 * @property \Illuminate\Database\Eloquent\Collection Orcamento
 * @property \Illuminate\Database\Eloquent\Collection orcamentomensagens
 * @property \Illuminate\Database\Eloquent\Collection Paginaevento
 * @property string nome
 * @property bigInteger idtipoevento
 * @property bigInteger idtemaestabelecimento
 * @property string descricao
 * @property boolean eventofechado
 * @property string|\Carbon\Carbon dtevento
 * @property time horaevento
 * @property boolean unicodia
 * @property string|\Carbon\Carbon dteventotermino
 * @property integer nrconvidados
 * @property integer nrpessoasesperado
 * @property string urllistapresentes
 * @property decimal vlrorcamento
 * @property string urlcompraingressos
 * @property integer faixaetariainicial
 * @property integer faixaetariafinal
 * @property string genero
 * @property bigInteger idgrau
 * @property boolean guiadeeventos
 * @property date dtprazomaxconfconvite
 * @property bigInteger idconsumidor
 * @property bigInteger idstatus
 * @property string endereco
 * @property string numero
 * @property string CEP
 * @property string complemento
 * @property string bairro
 * @property string cidade
 * @property string estado
 * @property string|\Carbon\Carbon dtinclusao
 * @property string|\Carbon\Carbon dtalteracao
 */
class Evento extends Model
{
    use SoftDeletes;

    public $table = 'evento';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome',
        'idtipoevento',
        'idtemaestabelecimento',
        'descricao',
        'eventofechado',
        'dtevento',
        'horaevento',
        'unicodia',
        'dteventotermino',
        'nrconvidados',
        'nrpessoasesperado',
        'urllistapresentes',
        'vlrorcamento',
        'urlcompraingressos',
        'faixaetariainicial',
        'faixaetariafinal',
        'genero',
        'idgrau',
        'guiadeeventos',
        'dtprazomaxconfconvite',
        'idconsumidor',
        'idstatus',
        'endereco',
        'numero',
        'CEP',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'dtinclusao',
        'dtalteracao'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome' => 'string',
        'descricao' => 'string',
        'eventofechado' => 'boolean',
        'unicodia' => 'boolean',
        'nrconvidados' => 'integer',
        'nrpessoasesperado' => 'integer',
        'urllistapresentes' => 'string',
        'urlcompraingressos' => 'string',
        'faixaetariainicial' => 'integer',
        'faixaetariafinal' => 'integer',
        'genero' => 'string',
        'guiadeeventos' => 'boolean',
        'dtprazomaxconfconvite' => 'date',
        'endereco' => 'string',
        'numero' => 'string',
        'CEP' => 'string',
        'complemento' => 'string',
        'bairro' => 'string',
        'cidade' => 'string',
        'estado' => 'string'
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
    public function tipoevento()
    {
        return $this->belongsTo(\App\Models\Tipoevento::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function temaestabelecimento()
    {
        return $this->belongsTo(\App\Models\Temaestabelecimento::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function grauservico()
    {
        return $this->belongsTo(\App\Models\Grauservico::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function eventoconvidados()
    {
        return $this->hasMany(\App\Models\Eventoconvidado::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function eventoconvites()
    {
        return $this->hasMany(\App\Models\Eventoconvite::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function eventohistoricos()
    {
        return $this->hasMany(\App\Models\Eventohistorico::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function eventopalavraschaves()
    {
        return $this->hasMany(\App\Models\Eventopalavraschave::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function cidades()
    {
        return $this->belongsToMany(\App\Models\Cidade::class, 'eventopublicoalvo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function ramonegocios()
    {
        return $this->belongsToMany(\App\Models\Ramonegocio::class, 'eventoservico');
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
    public function paginaeventos()
    {
        return $this->hasMany(\App\Models\Paginaevento::class);
    }
}

<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Anuncio
 * @package App\Models
 * @version September 16, 2018, 12:08 am UTC
 *
 * @property \App\Models\Anunciante anunciante
 * @property \App\Models\Usuario usuario
 * @property \App\Models\Statusanunciante statusanunciante
 * @property \App\Models\Ramonegocio ramonegocio
 * @property \Illuminate\Database\Eloquent\Collection Anunciantediapromoco
 * @property \Illuminate\Database\Eloquent\Collection anuncianteramonegocio
 * @property \Illuminate\Database\Eloquent\Collection anunciantetemaestabelecimento
 * @property \Illuminate\Database\Eloquent\Collection anunciantetipoevento
 * @property \Illuminate\Database\Eloquent\Collection Anuncioabrangenciaatuacao
 * @property \Illuminate\Database\Eloquent\Collection anuncioavaliacao
 * @property \Illuminate\Database\Eloquent\Collection Anunciodiapromoco
 * @property \Illuminate\Database\Eloquent\Collection Anunciofoto
 * @property \Illuminate\Database\Eloquent\Collection Anunciohorarioatendimento
 * @property \Illuminate\Database\Eloquent\Collection anuncioprecomedioevento
 * @property \Illuminate\Database\Eloquent\Collection Anunciopremio
 * @property \Illuminate\Database\Eloquent\Collection anunciotemaestabelecimento
 * @property \Illuminate\Database\Eloquent\Collection Anunciovideo
 * @property \Illuminate\Database\Eloquent\Collection consumidoropcaoculinaria
 * @property \Illuminate\Database\Eloquent\Collection consumidorpalavrachave
 * @property \Illuminate\Database\Eloquent\Collection eventopublicoalvo
 * @property \Illuminate\Database\Eloquent\Collection eventoservico
 * @property \Illuminate\Database\Eloquent\Collection Orcamento
 * @property \Illuminate\Database\Eloquent\Collection Orcamentoavulso
 * @property \Illuminate\Database\Eloquent\Collection orcamentomensagens
 * @property bigInteger idanunciante
 * @property string|\Carbon\Carbon dtinclusao
 * @property string|\Carbon\Carbon dtalteracao
 * @property bigInteger idstatus
 * @property bigInteger idramonegocio
 * @property string estabelecimentoproprio
 * @property integer qtdemaximapessoasporevento
 * @property string informacoesimportantes
 * @property string fotodestaquecaminho
 * @property integer score
 * @property bigInteger idusuario
 */
class Anuncio extends Model
{
    use SoftDeletes;

    public $table = 'anuncio';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'idanunciante',
        'dtinclusao',
        'dtalteracao',
        'idstatus',
        'idramonegocio',
        'estabelecimentoproprio',
        'qtdemaximapessoasporevento',
        'informacoesimportantes',
        'fotodestaquecaminho',
        'score',
        'idusuario'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'estabelecimentoproprio' => 'string',
        'qtdemaximapessoasporevento' => 'integer',
        'informacoesimportantes' => 'string',
        'fotodestaquecaminho' => 'string',
        'score' => 'integer'
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
    public function anunciante()
    {
        return $this->belongsTo(\App\Models\Anunciante::class);
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
    public function statusanunciante()
    {
        return $this->belongsTo(\App\Models\Statusanunciante::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ramonegocio()
    {
        return $this->belongsTo(\App\Models\Ramonegocio::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function anunciantediapromocos()
    {
        return $this->hasMany(\App\Models\Anunciantediapromoco::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function ramonegocios()
    {
        return $this->belongsToMany(\App\Models\Ramonegocio::class, 'anuncianteramonegocio');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function temaestabelecimentos()
    {
        return $this->belongsToMany(\App\Models\Temaestabelecimento::class, 'anunciantetemaestabelecimento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function tipoeventos()
    {
        return $this->belongsToMany(\App\Models\Tipoevento::class, 'anunciantetipoevento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function anuncioabrangenciaatuacaos()
    {
        return $this->hasMany(\App\Models\Anuncioabrangenciaatuacao::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function usuarios()
    {
        return $this->belongsToMany(\App\Models\Usuario::class, 'anuncioavaliacao');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function anunciodiapromocos()
    {
        return $this->hasMany(\App\Models\Anunciodiapromoco::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function anunciofotos()
    {
        return $this->hasMany(\App\Models\Anunciofoto::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function anunciohorarioatendimentos()
    {
        return $this->hasMany(\App\Models\Anunciohorarioatendimento::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function anunciopremios()
    {
        return $this->hasMany(\App\Models\Anunciopremio::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function anunciovideos()
    {
        return $this->hasMany(\App\Models\Anunciovideo::class);
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
    public function orcamentoavulsos()
    {
        return $this->hasMany(\App\Models\Orcamentoavulso::class);
    }
}

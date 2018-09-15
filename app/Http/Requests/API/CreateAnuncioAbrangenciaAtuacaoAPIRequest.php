<?php

namespace App\Http\Requests\API;

use App\Models\AnuncioAbrangenciaAtuacao;
use InfyOm\Generator\Request\APIRequest;

class CreateAnuncioAbrangenciaAtuacaoAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return AnuncioAbrangenciaAtuacao::$rules;
    }
}

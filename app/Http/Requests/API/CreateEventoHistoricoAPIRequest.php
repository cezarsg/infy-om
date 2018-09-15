<?php

namespace App\Http\Requests\API;

use App\Models\EventoHistorico;
use InfyOm\Generator\Request\APIRequest;

class CreateEventoHistoricoAPIRequest extends APIRequest
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
        return EventoHistorico::$rules;
    }
}
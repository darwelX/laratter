<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Esta clase es epecial para validar peticiones de formularios
 * que tienen muchos campos y muchas reglas de validadcion
 */
class CreateMessageRequest extends FormRequest
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
        return [
            'contenido' => ['required','max:160']
        ];
    }

    public function messages(){
        return  [
            'contenido.required' => 'El contenido es requerido',
            'contenido.max' => 'No puede escribir mas de 160 caracteres'
        ] ;
    }
}
